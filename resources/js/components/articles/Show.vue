<template>
    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl h-auto min-h-screen py-10 px-5 lg:px-10">

            <div class="flex w-full h-auto gap-5">
                <div class="md:w-4/5">
                    <transition name="fade">
                        <article-component v-show="isShow" :article="article"  :id="article.title" :username="username" />
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

</template>

<script>
import {computed, ref, watchEffect} from "vue";
    import {useRoute, useRouter} from "vue-router";
    import {apiGetArticle} from "../../api/article";
    import SideBox from "../shared/SideBox";
    import ArticleComponent from "./Article";
    import PopularSideBox from "../articles/PopularSideBox";
    import TagsSideBox from "../articles/TagsSideBox";

    export default {
        components: {
            ArticleComponent,
            SideBox,
            PopularSideBox,
            TagsSideBox
        },
        setup() {
            const route = useRoute();

            const article = ref({});
            const username = ref('');
            const isShow = ref(false);
            const errors = ref(false);
            watchEffect(async () => {
                isShow.value = false;
                await Promise.all([apiGetArticle(route.params.id)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){
                            fallback();
                        }else{
                            article.value = results[0].data;
                            username.value = article.value.user.name;
                            isShow.value = true;
                        }
                    });
            })

            const tags = computed(()=>{
                return article.value.tags;
            });

            const router = useRouter();
            function fallback(){
                router.push({
                    name:'articles'
                })
            }

            return {
                username,
                article,
                tags,
                isShow
            }
        },

    }
</script>
