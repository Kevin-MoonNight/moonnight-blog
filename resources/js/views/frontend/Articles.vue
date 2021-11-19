<template>
    <div class="flex flex-wrap content-between px-4 min-h-screen md:px-0" :class="!isShow ? 'h-screen' : ''">
        <search-input/>

        <p v-show="(articles.length === 0) && isShow" class="mt-10 w-full text-xl text-center text-red-500">
            找不到文章!
        </p>

        <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
            <loading-icon/>
        </div>
        <transition name="fade">
            <div v-if="isShow" class="mt-10 space-y-10 w-full h-auto">
                <article-card v-for="article in articles" :key="article" :article="article"/>
            </div>
        </transition>

        <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
            <paginator :items="response" :url="'articles'"/>
        </div>
    </div>
</template>

<script>
import {onBeforeMount, ref, computed, watch} from "vue";
import {apiGetArticles} from "../../api/article";
import {useRoute} from "vue-router";
import ArticleCard from "../articles/ArticleCard";
import Paginator from "../components/Paginator";
import SearchInput from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";

export default {
    components: {
        LoadingIcon,
        ArticleCard,
        Paginator,
        SearchInput,
    },
    metaInfo() {
        return {
            title: '文章'
        }
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
            isShow
        }
    }
}
</script>
