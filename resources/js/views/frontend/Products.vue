<template>
    <section class="pt-5 bg-blueGray-200 md:py-10">
        <div class="container mx-auto w-full max-w-screen-xl min-h-screen md:px-14">
            <div class="flex flex-wrap content-between px-4 min-h-screen md:px-0" :class="!isShow ? 'h-screen' : ''">
                <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                    <loading-icon></loading-icon>
                </div>
                <transition name="fade">
                    <div v-if="isShow"
                         class="grid grid-cols-1 gap-5 place-items-stretch w-full sm:grid-cols-2 lg:grid-cols-3">
                        <product-card v-for="product in products" :key="product" :product="product"></product-card>
                    </div>
                </transition>

                <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
                    <paginator class="w-full" :items="response" :link="'products'"></paginator>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {onBeforeMount, ref, computed, watch} from "vue";
import {useRoute} from "vue-router";
import Paginator from "../components/Paginator";
import ProductCard from "../products/ProductsCard";
import {apiGetProducts} from "../../api/product";
import LoadingIcon from "../components/LoadingIcon";

export default {
    components: {
        LoadingIcon,
        ProductCard,
        Paginator,
    },
    metaInfo() {
        return {
            title: '專案作品'
        }
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
                    products.value = results[0].data.data
                    response.value = results[0].data;
                    isShow.value = true;
                });
        }
        onBeforeMount(getProducts);
        watch(params, getProducts);

        return {
            products,
            response,
            isShow
        }
    }
}
</script>
