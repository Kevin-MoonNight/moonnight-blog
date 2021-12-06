<template>
    <article class="min-h-screen bg-white shadow-md md:rounded-md" :class="!isShow ? 'h-screen' : ''">
        <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
            <loading-icon/>
        </div>

        <div v-else class="p-8 w-full">
            <div class="flex items-center">
                <i class="far fa-calendar"></i>
                <p class="ml-3">
                    {{ author.name + '．' + date(article.created_at) }}
                </p>
            </div>

            <div class="mt-5">
                <h1 class="mb-5 text-4xl">
                    {{ article.title }}
                </h1>

                <div class="mb-5 h-60">
                    <img class="object-none object-center w-full h-full" alt="圖片無法載入..."
                         v-bind:src="article.thumbnail">
                </div>

                <h2 class="mb-5 text-xl text-blueGray-500">
                    {{ article.excerpt }}
                </h2>

                <hr class="my-4 border-blueGray-300"/>

                <h3 v-html="article.content" class="text-lg"></h3>
            </div>

            <div class="flex flex-wrap gap-2 mt-20 w-full h-auto">
                <p v-for="tag in article.tags" :key="'ArticleTags ' + tag.name" @click="queryTag(tag.name)"
                   class="px-3 py-1 text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:bg-blueGray-300">
                    {{ tag.name }}
                </p>
            </div>

            <div class="flex justify-between mt-10">
                <p class="">
                    {{ article.views }} views
                </p>
                <p @click="fallback"
                   class="font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                    回文章列表
                </p>
            </div>
        </div>
    </article>
</template>
<script>
import {computed, onBeforeMount, ref, watch} from "vue";
import {useRoute, useRouter} from "vue-router";
import {apiShowArticle} from "../../api/article";
import {useMeta} from 'vue-meta'
import {date} from "../../api/time";
import LoadingIcon from "../components/LoadingIcon";

export default {
    components: {
        LoadingIcon
    },
    setup() {
        const article = ref({
            title: '',
            slug: '',
            excerpt: '',
            content: '',
            thumbnail: '',
            tags: []
        });
        const author = ref({});
        const isShow = ref(false);

        const route = useRoute();
        const slug = computed(() => route.params.slug);
        const getArticle = async () => {
            //防止離開頁面執行
            if (slug.value != null) {
                isShow.value = false;
                await apiShowArticle(slug.value)
                    .then((res) => {
                        article.value = res.data;
                        author.value = res.data.author;
                        isShow.value = true;
                    }).catch(() => {
                        fallback();
                    })
            }
        };

        const computedMeta = computed(() => ({
            title: article.value.title ? article.value.title : '',
            description: article.value.excerpt ? article.value.excerpt : ''
        }))
        useMeta(computedMeta);

        onBeforeMount(getArticle);
        watch(slug, getArticle);

        const router = useRouter();
        //返回文章列表
        const fallback = () => {
            router.push({name: 'articles'})
        }
        //搜尋擁有該標籤的文章
        const queryTag = (tag) => {
            router.push({name: 'articles', query: {tag: tag}})
        }

        return {
            article,
            author,
            isShow,
            date: date,
            fallback,
            queryTag
        }
    }
}
</script>
