<template>
    <manage-layout :data="response" :link="link" :is-show="isShow" :search="true" :paginate="true">
        <articles-table
            :articles="articles"
            :refresh-articles="getArticles"
        >
        </articles-table>

        <p v-if="articles.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到文章!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, ref, watch, onBeforeMount} from "vue";
import {apiGetArticles} from "../../api/article";
import ManageLayout from "../layouts/ManageLayout";
import ArticlesTable from '../articles/ArticlesTable';

export default {
    components: {
        ArticlesTable,
        ManageLayout
    },
    setup() {
        const route = useRoute();
        const link = ref('articlesManage');
        const articles = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getArticles = async () => {
            isShow.value = false;
            await apiGetArticles(params.value)
                .then((results) => {
                    articles.value = results.data.data
                    response.value = results.data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getArticles);
        watch(params, getArticles);

        return {
            link,
            articles,
            response,
            isShow,
            getArticles
        }
    }
}
</script>
