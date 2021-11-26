<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <th class="py-2 border-r">標題</th>
            <th class="py-2 border-r">觀看數</th>
            <th class="py-2 border-r">時間</th>
            <th class="py-2 border-r">作者</th>
            <th class="py-2 border-r">狀態</th>
            <th class="py-2">動作</th>
        </tr>
        </thead>
        <transition name="fade">
            <tbody v-show="isShow">
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

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ article.state }}
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
            </tbody>
        </transition>
    </table>
</template>

<script>
import {toRefs} from "vue";
import {apiDeleteTrashedArticle, apiRestoreArticle} from "../../api/article";
import {useStore} from "vuex";
import moment from "moment";

export default {
    props: {
        articles: {
            type: Object
        },
        refreshArticles: {
            type: Function
        },
        isShow: {
            type: Boolean
        }
    },
    setup(props) {
        const {refreshArticles} = toRefs(props)
        const store = useStore();

        const restoreArticle = async (slug) => {
            await Promise.all([apiRestoreArticle(slug)])
                .then(() => {
                    store.dispatch('addNotice', {message: '文章復原成功!', color: true});
                    refreshArticles.value();
                });
        }
        const deleteArticle = async (slug) => {
            await Promise.all([apiDeleteTrashedArticle(slug)])
                .then(() => {
                    store.dispatch('addNotice', {message: '文章刪除成功!', color: true});
                    refreshArticles.value();
                });
        }

        function date(create_at) {
            return moment(create_at).format('YYYY-MM-DD');
        }

        return {
            restoreArticle,
            deleteArticle,
            date
        }
    }
}
</script>
