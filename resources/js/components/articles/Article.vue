<template>
    <div class="bg-white rounded-md shadow-md">
        <div class="h-auto w-full p-10 space-y-10">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>

                <div class="ml-5 text-gray-500">{{date}}．{{username}}</div>
            </div>

            <div class="min-h-screen">
                <div class="text-5xl pb-10 break-words">{{article.title}}</div>
                <div v-html="article.content" class="text-2xl"></div>
            </div>

            <div class="grid grid-cols-2 ">
                <p>{{article.views}} views</p>
                <p @click="fallback" class="flex justify-end cursor-pointer hover:text-black text-gray-600">回文章列表</p>
            </div>
        </div>
    </div>
</template>
<script>
    import {computed, ref} from "vue";
    import {useRouter} from "vue-router";
    import moment from "moment";

    export default {
        props:['article','username'],
        setup(props){
            const article = ref(props.article);

            const date = computed(()=>{
                return moment(article.value.created_at).format('Y-M-D');
            });

            const router = useRouter();
            function fallback(){
                router.push({name:'articles'})
            }

            return {
                date,
                fallback
            }
        }
    }
</script>
