<template>
    <div @click="toArticle(article.slug)" :title="article.title"
         class="block w-full h-60 bg-white rounded-md shadow-md cursor-pointer group hover:shadow-lg">
        <div class="grid grid-cols-3 w-full">
            <div class="col-span-2 p-4 h-60">
                <div class="h-4/5 truncate whitespace-normal">
                    <p class="">
                        {{ article.author.name + '．' + date(article.created_at) }}
                    </p>
                    <h1 class="mt-3 text-2xl font-bold">
                        {{ article.title }}
                    </h1>
                    <h2 class="my-3 text-gray-600">
                        {{ article.excerpt }}
                    </h2>
                </div>

                <div class="flex overflow-x-auto items-end h-1/5">
                    <span v-for="tag in article.tags"
                          class="px-4 py-1 mr-5 w-auto text-sm bg-gray-200 rounded-sm cursor-pointer hover:text-indigo-500 hover:bg-gray-300">
                        {{ tag }}
                    </span>
                </div>
            </div>

            <div class="object-cover col-span-1 h-60 bg-white rounded-r-md">
                <img class="object-none object-center w-full h-full rounded-r-md" alt="圖片無法載入..."
                     v-bind:src="article.thumbnail">
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import {useRouter} from "vue-router";

export default {
    props: ['article'],
    setup() {
        const router = useRouter();

        //導航到文章
        function toArticle(slug) {
            router.push({name: 'article', params: {slug: slug}});
        }

        //格式化日期
        const date = (created_at) => {
            return moment(created_at).fromNow();
        };

        return {
            date,
            toArticle
        }
    }
}
</script>
