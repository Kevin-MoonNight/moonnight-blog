<template>
    <side-box :name="'熱門文章'" :is-show="isShow">
        <p v-for="article in articles" :key="'PopularSideBox ' + article.slug" @click="toArticle(article.slug)"
           class="px-4 py-1 w-auto text-sm bg-gray-200 rounded-sm cursor-pointer hover:text-indigo-500 hover:bg-gray-300">
            {{ article.title }}
        </p>
    </side-box>
</template>
<script>
import {apiPopularArticles} from "../../api/article";
import {ref, onBeforeMount} from "vue";
import {useRouter} from 'vue-router';
import LoadingIcon from "../components/LoadingIcon";
import SideBox from "../components/SideBox";

export default {
    components: {
        LoadingIcon,
        SideBox,
    },
    setup() {
        const articles = ref([]);
        const isShow = ref(false);
        onBeforeMount(async () => {
            await apiPopularArticles()
                .then((res) => {
                    articles.value = res.data;
                    isShow.value = true;
                });
        })

        const router = useRouter();
        const toArticle = (slug) => {
            router.push({name: 'article', params: {slug: slug}});
        }

        return {
            articles,
            isShow,
            toArticle
        }
    }
}
</script>
