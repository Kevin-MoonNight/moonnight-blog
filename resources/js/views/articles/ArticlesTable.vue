<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <th class="py-2 border-r">標題</th>
            <th class="py-2 border-r">觀看數</th>
            <th class="py-2 border-r">時間</th>
            <th class="py-2 border-r">作者</th>
            <th class="py-2">動作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="article in articles" class="h-14 border-b group hover:bg-blueGray-200">
            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ article.title }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ article.views }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ date(article.created_at) }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ article.author.name }}
            </td>

            <td class="flex justify-around px-2 h-14 text-center min-w-32">
                <button @click="editArticle(article.slug)" class="hover:text-indigo-500" title="編輯文章">
                    <i class="far fa-edit"></i>
                </button>

                <button @click="deleteArticle(article.slug)" class="hover:text-indigo-500" title="刪除文章">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import {useStore} from "vuex";
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import {apiDeleteArticle} from "../../api/article";
import {date} from "../../api/time";

export default {
    props: {
        articles: {
            type: Object,
            required: true
        },
        refreshArticles: {
            type: Function,
            required: true
        }
    },
    setup(props) {
        const {refreshArticles} = toRefs(props)
        const store = useStore();
        const router = useRouter();

        const editArticle = (slug) => {
            router.push({name: 'articlesEdit', params: {slug: slug}});
        }
        const deleteArticle = async (slug) => {
            await Promise.all([apiDeleteArticle(slug)])
                .then(() => {
                    store.dispatch('addNotice', {message: '文章刪除成功!', color: true});
                    refreshArticles.value();
                });
        }

        return {
            editArticle,
            deleteArticle,
            date: date
        }
    }
}
</script>
