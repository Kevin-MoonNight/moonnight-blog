<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <base-label html-for="name">名稱</base-label>

                    <base-input-text
                        v-model:value="product.name"
                        name="name"
                        placeholder="名稱"
                    >
                    </base-input-text>
                </div>
                <div class="mt-4 w-full">
                    <base-label html-for="thumbnail">縮圖</base-label>

                    <div class="flex">
                        <input type="file" @change="getThumbnail($event)" id="thumbnail" name="thumbnail"
                               placeholder="縮圖">
                        <img v-if="thumbnailSrc !== null" v-bind:src="thumbnailSrc" alt="縮圖"
                             class="w-auto h-24">
                    </div>
                </div>

                <div class="mt-4 w-full">
                    <base-label html-for="excerpt">摘要</base-label>

                    <base-input-text
                        v-model:value="product.excerpt"
                        name="excerpt"
                        placeholder="摘要"
                    >
                    </base-input-text>
                </div>

                <div class="flex justify-end mt-4 w-full">
                    <base-button @click="updateProduct">
                        更新作品
                    </base-button>
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
import {transformToFormData} from "../../api/utils";
import BaseButton from "../components/BaseButton";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";

export default {
    components: {
        BaseInputText,
        BaseLabel,
        BaseButton
    },
    setup() {
        const product = ref({
            name: '',
            excerpt: '',
            thumbnail: null
        });
        const thumbnailSrc = ref(null);

        const isShow = ref(false);
        const route = useRoute()
        const id = route.params.id;
        onBeforeMount(async () => {
            await apiGetProduct(id)
                .then((res) => {
                    product.value = res.data;
                    thumbnailSrc.value = product.value.thumbnail;
                    product.value.thumbnail = null;
                    isShow.value = true;
                });
        });

        const getThumbnail = (event) => {
            const reader = new FileReader();

            reader.onloadend = function () {
                thumbnailSrc.value = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);

            product.value.thumbnail = event.target.files[0]
        }

        const router = useRouter();
        const store = useStore();
        const updateProduct = async () => {
            await apiUpdateProduct(id, transformToFormData(product.value))
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

