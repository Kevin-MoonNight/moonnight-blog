<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="p-5">
            <div class="w-full">
                <label htmlFor="name"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    名稱
                </label>
                <input v-model="product.name" id="name" type="text" name="name" placeholder="名稱"
                       class="input-style">
            </div>
            <div class="mt-4 w-full">
                <label htmlFor="thumbnail"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    縮圖
                </label>
                <div class="flex">
                    <input type="file" @change="getThumbnail($event)" id="thumbnail" name="thumbnail"
                           placeholder="縮圖">
                    <img v-if="thumbnailSrc !== null" v-bind:src="thumbnailSrc" alt="縮圖"
                         class="w-auto h-24">
                </div>
            </div>

            <div class="mt-4 w-full">
                <label htmlFor="excerpt"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    摘要
                </label>
                <input v-model="product.excerpt" id="excerpt" type="text" name="excerpt" placeholder="摘要"
                       class="input-style">
            </div>

            <div class="flex justify-end mt-4 w-full">
                <button @click="createProduct"
                        class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                    新增作品
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";
import {useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiCreateProduct} from "../../api/product";

export default {
    setup() {
        const product = ref({
            name: '',
            excerpt: '',
            thumbnail: null
        });
        const thumbnailSrc = ref(null);

        const getThumbnail = (event) => {
            const reader = new FileReader();

            reader.onloadend = function () {
                thumbnailSrc.value = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);

            product.value.thumbnail = event.target.files[0]
        }
        const inputData = () => {
            const data = new FormData();

            Object.keys(product.value).forEach((key) => {
                data.append(key, product.value[key])
            });

            return data;
        }

        const router = useRouter();
        const store = useStore();
        const createProduct = async () => {
            await Promise.all([apiCreateProduct(inputData())])
                .then(() => {
                    store.dispatch('addNotice', {message: '作品新增成功!', color: true});
                    router.push({name: 'productsManage'});
                });
        };

        return {
            product,
            thumbnailSrc,
            createProduct,
            getThumbnail
        }
    }
}
</script>
