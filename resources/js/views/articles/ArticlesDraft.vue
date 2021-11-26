<template>
    <search-box :link="'articlesDraft'"></search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <articles-draft-list
                v-if="isShow"
                :articles="articles"
                :refresh-articles="getArticles"
                :is-show="isShow">
            </articles-draft-list>
            <p v-if="articles.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
                找不到文章!
            </p>
        </div>
    </div>

    <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="response" :url="'articlesDraft'"></paginator>
    </div>
</template>

<script>
import ArticlesTrashedList from "./ArticlesTrashedList";
import paginator from "../components/Paginator";
import SearchBox from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetDraftArticles} from "../../api/article";
import ArticlesDraftList from "./ArticlesDraftList";

export default {
    components: {
        ArticlesDraftList,
        LoadingIcon,
        SearchBox,
        paginator,
        ArticlesTrashedList
    },
    setup() {
        const route = useRoute();
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
            articles,
            response,
            isShow,
            getArticles
        }
    }
}
</script>
