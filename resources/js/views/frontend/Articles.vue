<template>
    <div class="flex justify-center bg-blueGray-200">
        <div class="px-5 py-10 w-full max-w-screen-xl h-auto min-h-screen lg:px-10">

            <div class="flex justify-center mb-10">
                <search-input/>
            </div>

            <p class="text-xl text-center" v-show="(articles.length === 0) && isShow">
                找不到文章!
            </p>

            <div class="flex gap-5 w-full h-auto">
                <div class="md:w-4/5">
                    <transition name="fade">
                        <div v-show="isShow" class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                            <article-card v-for="article in articles" :key="'Articles ' + article.id"
                                          :article="article"/>
                        </div>
                    </transition>
                </div>

                <div class="hidden w-1/4 select-none md:block">
                    <div class="sticky top-24 space-y-5 w-full h-auto">
                        <popular-side-box/>
                        <tags-side-box/>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="flex justify-center bg-white">
        <paginator class="w-full max-w-screen-xl" :items="response"/>
    </div>
</template>

<script>
import {onBeforeMount, ref, computed, watch} from "vue";
import {apiGetArticles} from "../../api/article";
import {useRoute} from "vue-router";
import ArticleCard from "../articles/ArticleCard";
import Paginator from "../components/Paginator";
import SearchInput from "../components/SearchBox";
import PopularSideBox from "../articles/PopularSideBox";
import TagsSideBox from "../articles/TagsSideBox";

export default {
    components: {
        ArticleCard,
        Paginator,
        SearchInput,
        PopularSideBox,
        TagsSideBox
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
                }).catch((error) => {

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
