<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
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
                    <button @click="updateProduct"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        更新作品
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiGetProduct, apiUpdateProduct} from "../../api/product";

export default {
    setup() {
        const product = ref({
            name: '',
            excerpt: '',
            thumbnail: null
        });
        const thumbnailSrc = ref(null);

        const isShow = ref(false);
        const route = useRoute()
        const productId = route.params.id;
        const getData = async () => {
            await Promise.all([apiGetProduct(productId)])
                .then((results) => {
                    product.value = results[0].data;
                    thumbnailSrc.value = product.value.thumbnail;
                    product.value.thumbnail = null;
                    isShow.value = true;
                });
        }
        onBeforeMount(getData);

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
        const updateProduct = async () => {
            await Promise.all([apiUpdateProduct(productId, inputData())])
                .then(() => {
                    store.dispatch('addNotice', {message: '作品更新成功!', color: true});
                    router.push({name: 'productsManage'});
                });
        };

        return {
            product,
            thumbnailSrc,
            isShow,
            updateProduct,
            getThumbnail
        }
    }
}
</script>

