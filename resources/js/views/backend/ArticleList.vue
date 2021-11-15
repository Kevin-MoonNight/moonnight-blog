<template>
    <table class="table-auto w-full h-full min-w-lg">
        <thead>
        <tr class="bg-gray-400">
            <th class="w-1/6 py-2">標題</th>
            <th class="w-1/6 py-2">觀看數</th>
            <th class="w-1/6 py-2">時間</th>
            <th class="w-1/6 py-2">狀態</th>
            <th class="w-1/6 py-2">動作</th>
        </tr>
        </thead>

        <transition name="fade">
            <tbody v-show="isShow">
            <tr v-for="article in articles" class="h-14 hover:bg-gray-200 border-b">
                <td class="h-14 text-center ">
                    {{article.title}}
                </td>

                <td class="h-14 text-center ">
                    {{article.views}}
                </td>

                <td class="h-14  text-center">
                    {{date(article.created_at)}}
                </td>

                <td class="h-14 text-center">
                    {{article.state}}
                </td>

                <td class="flex justify-center h-14 space-x-10">
                    <button @click="editArticle(article.id)" class="hover:text-blue-500" title="編輯文章">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>

                    <button @click="deleteArticle(article.id)" class="hover:text-blue-500" title="刪除文章">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </td>
            </tr>
            </tbody>
        </transition>
    </table>
</template>

<script>
    import {useRouter} from "vue-router";
    import {ref, toRefs} from "vue";
    import moment from "moment";
    import {apiDeleteArticle} from "../../api/article";
    import {useStore} from "vuex";

    export default {
        props:['articles','isShow','refreshArticles'],
        setup(props){
            const {refreshArticles} = toRefs(props)

            const router = useRouter();
            function editArticle(id){
                router.push({
                    name: 'articlesEdit',
                    params: {
                        id
                    }
                });
            }
            const errors = ref('');
            const store = useStore();
            const deleteArticle =  async (articleId) => {
                await Promise.all([apiDeleteArticle(articleId)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){

                        }else{
                            store.dispatch('addNotice',{name:'提醒',message:'文章刪除成功!'});
                            refreshArticles.value();
                        }
                    });
            }

            function date(create_at){
                return moment(create_at).format('YYYY-MM-DD');
            }

            return {
                errors,
                editArticle,
                deleteArticle,
                date,
            }
        }
    }
</script>
