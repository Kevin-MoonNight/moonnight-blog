<template>
    <div class="w-full h-auto pb-10">
        <div class="w-full h-auto bg-white rounded-md">
            <div class="overflow-x-auto">
                <article-list v-bind:is-show="isShow" v-bind:articles="articles" v-bind:refresh-articles="getArticles"></article-list>
            </div>
            <paginator class="py-4" v-bind:items="response" v-bind:update-url="updateUrl" />
        </div>
    </div>
</template>

<script>
    import ArticleList from './ArticleList';
    import paginator from "../components/Paginator";
    import {ref, watchEffect} from "vue";
    import {apiArticles} from "../../api/article";

    export default {
        components: {
            paginator,
            ArticleList
        },
        setup(){
            const articles = ref([]);
            const response = ref({});
            const isShow = ref(false);

            const url = ref('/articles');
            function updateUrl(newUrl){
                if(newUrl !== null && newUrl !== url.value){
                    url.value = newUrl;
                }
            };

            const getArticles = async () =>{
                isShow.value = false;
                await Promise.all([apiArticles(url.value)])
                    .then((results) => {
                        articles.value = results[0].data.data
                        response.value = results[0].data;
                        isShow.value=true;
                    });
            };

            watchEffect(getArticles);

            return {
                articles,
                response,
                isShow,
                updateUrl,
                getArticles
            }
        }
    }
</script>
