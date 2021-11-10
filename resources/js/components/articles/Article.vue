<template>
    <transition name="fade">
    <div v-show="isShow" class="bg-white rounded-md shadow-md">
        <div class="p-10 space-y-10 w-full h-auto">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>

                <div class="ml-5 text-gray-500">{{date(article.created_at)}}．{{username}}</div>
            </div>

            <div class="min-h-screen">
                <div class="pb-10 text-5xl break-words">{{article.title}}</div>
                <div v-html="article.content" class="text-2xl"></div>
            </div>

            <div class="flex flex-wrap gap-2 w-full h-auto">
                <p v-for="tag in article.tags" :key="'ArticleTags ' + tag.name" @click="queryTag(tag.name)"
                   class="px-3 py-1 text-sm bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">

                    {{ tag.name }}
                </p>
            </div>
            <div class="grid grid-cols-2">
                <p>{{article.views}} views</p>
                <p @click="fallback" class="flex justify-end text-gray-600 cursor-pointer hover:text-black">回文章列表</p>
            </div>
        </div>
    </div>
    </transition>
</template>
<script>
    import {computed, onBeforeMount, ref, watch} from "vue";
    import {useRoute, useRouter} from "vue-router";
    import {apiGetArticle} from "../../api/article";
    import moment from "moment";

    export default {
        setup(){
            const article = ref({});
            const username = ref(null);
            const isShow = ref(false);

            const route = useRoute();
            const articleId = computed(() => route.params.id);
            const getArticle = async () => {
                //防止離開頁面執行
                if(articleId.value != null){
                    isShow.value = false;
                    await Promise.all([apiGetArticle(articleId.value)])
                        .then((results) => {
                            article.value = results[0].data;
                            username.value = results[0].data.author.name
                            isShow.value = true;
                        }).catch((error)=>{
                            fallback();
                        })
                }
            };
            onBeforeMount(getArticle);
            watch(articleId,getArticle);

            const router = useRouter();
            //返回文章列表
            const fallback = () => {

                router.push({name:'articles'})
            }
            //搜尋擁有該標籤的文章
            const queryTag = (tag) => {
                router.push({name:'articles',query:{tag:tag}})
            }

            //格式化日期
            const date = (created_at) => {
                return moment(created_at).format('YYYY-MM-DD');
            };

            return {
                article,
                username,
                isShow,
                date,
                fallback,
                queryTag
            }
        }
    }
</script>
