<template>
    <transition name="fade">
        <side-box v-show="isShow" :name="'熱門文章'">
            <p v-for="article in articles" :key="article.title" @click="show(article.id)"
               class="w-auto px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm cursor-pointer">

                {{ article.title }}
            </p>
        </side-box>
    </transition>
</template>
<script>
    import SideBox from "../shared/SideBox";
    import {apiPopularArticles} from "../../api/article";
    import {ref, onBeforeMount} from "vue";
    import {useRouter} from 'vue-router';

    export default {
        components:{
            SideBox,
        },
        setup(){
            const articles = ref([]);
            const isShow = ref(false);
            onBeforeMount(async ()=>{
                isShow.value = false;
                await Promise.all([apiPopularArticles()])
                    .then((results) => {
                        articles.value = results[0].data;
                        isShow.value = true;
                    });
            })

            const router = useRouter();
            const show = (id) => {
                router.push({name:'showArticle',params:{id:id}});
            }

            return {
                articles,
                isShow,
                show
            }
        }
    }
</script>
