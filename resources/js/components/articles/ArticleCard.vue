<template>
    <div @click="showArticle(article.id)"
         class="transition transform duration-200 mx-auto bg-white shadow-md rounded-lg hover:scale-105 hover:shadow-xl">

        <div class="flex space-x-3 items-center p-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>

            <p class="">
                {{article.user.name + "．" + date(article.created_at)}}
            </p>
        </div>

        <img class="w-full" alt="圖片無法載入..." v-bind:src="article.url">

        <div class="p-4">
            <div class="h-48 overflow-hidden">
                <p class="hover:cursor-pointer font-bold text-2xl break-words">{{article.title}}</p>
                <p v-html="article.content.substr(0,100) +' more...'" class="hover:cursor-pointer py-3 text-gray-600"></p>
            </div>

            <div class="flex items-end">
                <div class="h-12 overflow-x-auto">
                    <span v-for="tag in article.tags" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm m-2">{{tag.name}}</span>
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
    import { ref } from 'vue';

    export default {
        props:['article'],
        setup(props){
            const article = ref(props.article);
            const router = useRouter();
            function showArticle(id){
                router.push({name: 'showArticle', params: {id:id}});
            }

            function date(created_at){
                return moment(created_at).fromNow()
            }

            return {
                date,
                showArticle,
                article
            }
        }
    }
</script>
