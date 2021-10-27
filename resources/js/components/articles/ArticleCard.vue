<template>
    <div @click="showArticle(article.id)"
         class="mx-auto w-full bg-white rounded-lg shadow-md transition duration-200 transform cursor-pointer hover:scale-105 hover:shadow-xl">

        <div class="flex items-center p-4 space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>

            <p class="">
                {{article.author.name + "．" + date(article.created_at)}}
            </p>
        </div>

        <img class="w-full" alt="圖片無法載入..." v-bind:src="article.thumbnail">

        <div class="p-4">
            <div class="overflow-hidden h-48">
                <p class="text-2xl font-bold break-words hover:cursor-pointer">{{article.title}}</p>
                <p v-html="article.content.substr(0,100) +' more...'" class="py-3 text-gray-600 hover:cursor-pointer"></p>
            </div>

            <div class="flex items-end">
                <div class="overflow-x-auto h-12">
                    <span v-for="tag in article.tags" class="inline-block px-3 py-1 m-2 text-sm bg-gray-200 rounded-full">{{tag.name}}</span>
                </div>
            </div>
            <p class="flex justify-end">
                {{article.views}} views
            </p>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    import { useRouter } from "vue-router";

    export default {
        props:['article'],
        setup(){
            const router = useRouter();
            //導航到文章
            function showArticle(id){
                router.push({name: 'showArticle', params: {id:id}});
            }
            //格式化日期
            const date = (created_at) => {
                return moment(created_at).fromNow();
            };

            return {
                date,
                showArticle
            }
        }
    }
</script>
