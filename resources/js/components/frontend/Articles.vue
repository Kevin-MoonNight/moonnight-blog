<template>
    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl h-auto min-h-screen py-10 px-5 lg:px-10">

            <div class="flex justify-center mb-10">
                <search-input :update-url="updateUrl" />
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
        <paginator class="w-full max-w-screen-xl" :items="response" :update-url="updateUrl" />
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
            const articles = ref([]);
            const response = ref({});
            const isShow = ref(false);
            const url = ref('/articles');
            const route = useRoute();
            const errors = ref(false);
            watchEffect(async () => {
                isShow.value = false;

                if(route.params.text != null) {
                    url.value ='/articles/tag/' + route.params.text;
                }

                await Promise.all([apiArticles(url.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(!errors.value){
                            articles.value = results[0].data.data
                        }
                        response.value = results[0].data;
                        isShow.value= true;
                    });

            });


            function updateUrl(newUrl){
                if(newUrl !== null && newUrl !== url.value){
                    url.value = newUrl;
                }
            };

            return {
                articles,
                response,
                updateUrl,
                isShow,
                url,
                errors
            }
        }
    }
</script>
