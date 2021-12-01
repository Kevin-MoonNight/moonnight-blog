<template>
    <manage-layout :data="response" :link="link" :is-show="isShow" :search="true" :paginate="true">
        <articles-draft-table
            v-if="isShow"
            :articles="articles"
            :refresh-articles="getArticles"
        >
        </articles-draft-table>

        <p v-if="articles.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到文章!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, ref, watch, onBeforeMount} from "vue";
import {apiGetDraftArticles} from "../../api/article";
import ArticlesDraftTable from "./ArticlesDraftTable";
import ManageLayout from "../layouts/ManageLayout";

export default {
    components: {
        ArticlesDraftTable,
        ManageLayout
    },
    setup() {
        const route = useRoute();
        const link = ref('articlesDraft');
        const articles = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getArticles = async () => {
            isShow.value = false;
            await Promise.all([apiGetDraftArticles(params.value)])
                .then((results) => {
                    articles.value = results[0].data.data
                    response.value = results[0].data;
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
