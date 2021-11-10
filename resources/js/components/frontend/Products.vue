<template>
    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl h-auto min-h-screen py-10 px-5 lg:px-10">
            <div class="flex w-full h-auto gap-5">
                <transition name="fade">
                    <div v-show="isShow" class="grid grid-cols-1 md:grid-cols-4 gap-5">
                        <product-card v-for="product in products" :key="'Products ' + product.id" :product="product" />
                    </div>
                </transition>
            </div>
        </div>
    </div>

    <div class="flex justify-center bg-white">
        <paginator class="w-full max-w-screen-xl" :items="response" />
    </div>
</template>

<script>
    import {onBeforeMount, ref, computed, watch} from "vue";
    import {apiArticles} from "../../api/article";
    import {useRoute} from "vue-router";
    import Paginator from "../shared/Paginator";
    import ProductCard from "./ProductCard";

    export default {
        components: {
            ProductCard,
            Paginator,
        },
        setup(){
            const route = useRoute();
            const apiUrl = computed(()=>{
                let url ='/articles';
                if(route.query.page != null){
                    url += '?page=' + route.query.page;
                }
                return url;
            })

            const products = ref([]);
            const response = ref({});
            const isShow = ref(false);
            const errors = ref(false);

            const getProducts = async () => {
                isShow.value = false;
                await Promise.all([apiArticles(apiUrl.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(!errors.value){
                            products.value = results[0].data.data
                        }
                        response.value = results[0].data;
                        isShow.value= true;
                    });
            }
            onBeforeMount(getProducts);
            watch(apiUrl,getProducts);

            return {
                products,
                response,
                isShow,
                errors,
                apiUrl
            }
        }
    }
</script>
