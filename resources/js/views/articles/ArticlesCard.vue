<template>
    <div @click="redirectToArticle(article.slug)" :title="article.title"
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

                <div class="flex overflow-auto flex-wrap items-end space-y-4 h-1/5">
                    <span v-for="tag in article.tags"
                          class="px-4 py-1 mr-5 text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:text-indigo-500 hover:bg-blueGray-300">
                        {{ tag.name }}
                    </span>
                </div>
            </div>

            <div class="object-cover col-span-1 h-60 bg-white rounded-r-md">
                <img class="object-none object-center w-full h-full rounded-r-md"
                     v-lazy="{src: article.thumbnail}" alt="圖片無法載入...">
            </div>
        </div>
    </div>
</template>

<script>
import {useRouter} from "vue-router";
import {fromNow} from "../../api/time";

export default {
    props: {
        article: {
            type: Object,
            required: true
        }
    },
    setup() {
        const router = useRouter();
        const redirectToArticle = (slug) => {
            router.push({name: 'article', params: {slug: slug}});
        }

        return {
            date: fromNow,
            redirectToArticle
        }
    }
}
</script>
