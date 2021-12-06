<template>
    <manage-layout :data="response" :link="link" :is-show="isShow" :search="true" :paginate="true">
        <articles-trashed-table
            :articles="articles"
            :refresh-articles="getArticles"
        >
        </articles-trashed-table>
        <p v-if="articles.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
            找不到文章!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, ref, watch, onBeforeMount} from "vue";
import {apiGetTrashedArticles} from "../../api/article";
import ManageLayout from "../layouts/ManageLayout";
import ArticlesTrashedTable from "./ArticlesTrashedTable";

export default {
    components: {
        ArticlesTrashedTable,
        ManageLayout
    },
    setup() {
        const route = useRoute();
        const link = ref('articlesTrashed');
        const articles = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getArticles = async () => {
            isShow.value = false;
            await apiGetTrashedArticles(params.value)
                .then((res) => {
                    articles.value = res.data.data
                    response.value = res.data;
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
