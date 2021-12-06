<template>
    <manage-layout
        :data="response"
        :link="link"
        :is-show="isShow"
        :search="true"
        :paginate="true"
    >
        <products-list
            :products="products"
            :refresh-products="getProducts"
        >
        </products-list>

        <p v-if="products.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到標籤!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetProducts} from "../../api/product";
import ProductsList from "../products/ProductsList";
import paginator from "../components/Paginator";
import LoadingIcon from "../components/LoadingIcon";
import ManageLayout from "../layouts/ManageLayout";

export default {
    components: {
        LoadingIcon,
        paginator,
        ProductsList,
        ManageLayout
    },
    setup() {
        const route = useRoute();
        const link = ref('productsManage');
        const products = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getProducts = async () => {
            isShow.value = false;
            await apiGetProducts(params.value)
                .then((res) => {
                    products.value = res.data.data;
                    response.value = res.data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getProducts);
        watch(params, getProducts);

        return {
            link,
            products,
            response,
            isShow,
            getProducts
        }
    }
}
</script>
