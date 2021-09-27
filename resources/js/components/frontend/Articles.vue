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
                            <article-card v-for="article in articles" :key="article.id" :article="article" />
                        </div>
                    </transition>
                </div>

                <div class="hidden md:block w-1/4 select-none">
                    <div class="sticky top-24 w-full h-auto space-y-5 ">
                        <popular-side-box />
                        <tags-side-box  />
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="flex justify-center bg-white">
        <paginator class="w-full max-w-screen-xl" :items="response" :change-page="changePage" />
    </div>
</template>

<script>
    import { ref, watchEffect} from "vue";
    import {apiArticles} from "../../api/article";
    import ArticleCard from "../articles/ArticleCard";
    import Paginator from "../shared/Paginator";
    import SearchInput from "../shared/SearchBox";
    import PopularSideBox from "../articles/PopularSideBox";
    import TagsSideBox from "../articles/TagsSideBox";
    import {useRoute} from "vue-router";

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
            const apiUrl = ref('/articles');
            const page =ref(null);
            const judgeUrl = () => {
                if(route.query.tag != null) {
                    apiUrl.value ='/articles/tag/' + route.query.tag;
                }else if(route.query.search != null){
                    apiUrl.value ='/articles/search/' + route.query.search;
                }else{
                    apiUrl.value = '/articles';
                }

                if(page.value !== null){
                    apiUrl.value = apiUrl.value.split('?page=')[0];
                    apiUrl.value += '?page=' + page.value;
                }
            }

            const articles = ref([]);
            const response = ref({});
            const isShow = ref(false);
            const errors = ref(false);
            watchEffect(async () => {
                isShow.value = false;
                judgeUrl();
                await Promise.all([apiArticles(apiUrl.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(!errors.value){
                            articles.value = results[0].data.data
                        }
                        response.value = results[0].data;
                        isShow.value= true;
                    });
            });

            const changePage = (newValue)=>{
                if(page.value !== newValue){
                    page.value = newValue;
                }
            }

            return {
                articles,
                response,
                isShow,
                errors,
                apiUrl,
                changePage
            }
        }
    }
</script>
