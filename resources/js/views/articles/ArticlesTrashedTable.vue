<template>
    <table-layout>
        <template v-slot:header>
            <th class="py-2 border-r">標題</th>
            <th class="py-2 border-r">觀看數</th>
            <th class="py-2 border-r">時間</th>
            <th class="py-2 border-r">作者</th>
            <th class="py-2">動作</th>
        </template>

        <template v-slot:body>
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
                    <button @click="restoreArticle(article.slug)" class="hover:text-indigo-500" title="復原文章">
                        <i class="fas fa-trash-restore-alt"></i>
                    </button>

                    <button @click="deleteArticle(article.slug)" class="hover:text-indigo-500" title="刪除文章">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        </template>
    </table-layout>
</template>

<script>
import {toRefs} from "vue";
import {apiDeleteTrashedArticle, apiRestoreArticle} from "../../api/article";
import {useStore} from "vuex";
import {date} from "../../api/time";
import TableLayout from "../layouts/TableLayout";

export default {
    components: {TableLayout},
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

        const restoreArticle = async (slug) => {
            await apiRestoreArticle(slug)
                .then(() => {
                    store.dispatch('addNotice', {message: '文章復原成功!', color: true});
                    refreshArticles.value();
                });
        }
        const deleteArticle = async (slug) => {
            await apiDeleteTrashedArticle(slug)
                .then(() => {
                    store.dispatch('addNotice', {message: '文章刪除成功!', color: true});
                    refreshArticles.value();
                });
        }

        return {
            restoreArticle,
            deleteArticle,
            date: date
        }
    }
}
</script>
