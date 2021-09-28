<template>
    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl h-auto min-h-screen py-10 px-5 lg:px-10">

            <div class="flex justify-center mb-10">
                <search-input />
            </div>

            <p class="text-xl text-center" v-show="(articles.length === 0 || errors) && isShow">
                找不到文章!
            </p>

            <div class="flex w-full h-auto gap-5">
                <div class="md:w-4/5">
                    <transition name="fade">
                        <div v-show="isShow" class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                            <article-card v-for="article in articles" :key="'Articles ' + article.id" :article="article" />
                        </div>
                    </transition>
                </div>

                <div class="hidden md:block w-1/4 select-none">
                    <div class="sticky top-24 w-full h-auto space-y-5 ">
                        <popular-side-box />
                        <tags-side-box />
                    </div>
                </div>
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
    import ArticleCard from "../articles/ArticleCard";
    import Paginator from "../shared/Paginator";
    import SearchInput from "../shared/SearchBox";
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
        setup(){
            const route = useRoute();
            const apiUrl = computed(()=>{
                let url ='';
                if(route.query.tag != null) {
                    url = '/articles/tag/' + route.query.tag;
                }else if(route.query.search != null){
                    url = '/articles/search/' + route.query.search;
                }else{
                    url = '/articles';
                }

                if(route.query.page != null){
                    url += '?page=' + route.query.page;
                }

                return url;
            })

            const articles = ref([]);
            const response = ref({});
            const isShow = ref(false);
            const errors = ref(false);

            const getArticles = async () => {
                isShow.value = false;
                await Promise.all([apiArticles(apiUrl.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(!errors.value){
                            articles.value = results[0].data.data
                        }
                        response.value = results[0].data;
                        isShow.value= true;
                    });
            }
            onBeforeMount(getArticles);
            watch(apiUrl,getArticles);

            return {
                articles,
                response,
                isShow,
                errors,
                apiUrl
            }
        }
    }
</script>
