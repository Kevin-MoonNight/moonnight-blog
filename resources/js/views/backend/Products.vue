<template>
    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <products-list
                v-if="isShow"
                :products="products"
                :refresh-products="getProducts"
                :is-show="isShow">
            </products-list>
            <p v-if="products.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
                找不到標籤!
            </p>
        </div>
    </div>
    <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="response" :link="'productsManage'"></paginator>
    </div>
</template>

<script>
import ProductsList from "../products/ProductsList";
import paginator from "../components/Paginator";
import LoadingIcon from "../components/LoadingIcon";
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetProducts} from "../../api/product";

export default {
    components: {
        LoadingIcon,
        paginator,
        ProductsList
    },
    setup() {
        const route = useRoute();
        const products = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getProducts = async () => {
            isShow.value = false;
            await Promise.all([apiGetProducts(params.value)])
                .then((results) => {
                    products.value = results[0].data.data;
                    response.value = results[0].data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getProducts);
        watch(params, getProducts);

        return {
            products,
            response,
            isShow,
            getProducts
        }
    }
}
</script>
