<template>
    <search-box :link="'articlesManages'"/>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon/>
            </div>

            <article-list v-if="isShow" :articles="articles" :refresh-articles="getArticles" :is-show="isShow"/>
            <p v-if="isShow" v-show="articles.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
                找不到文章!
            </p>
        </div>
    </div>
    <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="response" :url="'articlesManages'"/>
    </div>
</template>

<script>
import ArticleList from '../articles/ArticleList';
import paginator from "../components/Paginator";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetArticles} from "../../api/article";
import SearchBox from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";
import {useRoute} from "vue-router";

export default {
    components: {
        LoadingIcon,
        SearchBox,
        paginator,
        ArticleList
    },
    setup() {
        const route = useRoute();
        const articles = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getArticles = async () => {
            isShow.value = false;
            await Promise.all([apiGetArticles(params.value)])
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
