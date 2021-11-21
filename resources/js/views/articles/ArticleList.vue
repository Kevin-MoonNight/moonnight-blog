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
            <tr v-for="article in articles" class="h-14 border-b hover:text-indigo-500 hover:bg-blueGray-200">
                <td class="h-14 text-center">
                    {{ article.title }}
                </td>

                <td class="h-14 text-center">
                    {{ article.views }}
                </td>

                <td class="h-14 text-center">
                    {{ date(article.created_at) }}
                </td>

                <td class="h-14 text-center">
                    {{ article.author.name }}
                </td>

                <td class="h-14 text-center">
                    {{ article.state }}
                </td>

                <td class="flex justify-around h-14">
                    <button @click="editArticle(article.slug)" class="hover:text-indigo-500" title="編輯文章">
                        <i class="far fa-edit"></i>
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
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import moment from "moment";
import {apiDeleteArticle} from "../../api/article";
import {useStore} from "vuex";

export default {
    props: ['articles', 'isShow', 'refreshArticles'],
    setup(props) {
        const {refreshArticles} = toRefs(props)

        const router = useRouter();

        function editArticle(slug) {
            router.push({name: 'editArticle', params: {slug: slug}});
        }

        const store = useStore();
        const deleteArticle = async (slug) => {
            await Promise.all([apiDeleteArticle(slug)])
                .then(() => {
                    store.dispatch('addNotice', {message: '文章刪除成功!', color: true});
                    refreshArticles.value();
                });
        }

        function date(create_at) {
            return moment(create_at).format('YYYY-MM-DD');
        }

        return {
            editArticle,
            deleteArticle,
            date,
        }
    }
}
</script>
