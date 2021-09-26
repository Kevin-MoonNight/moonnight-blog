<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto pb-10">
            <div class="w-full h-auto bg-white rounded-md">
                <div class="p-5 space-y-5 mb-10">
                    <div class ="">
                        <label for="title" class="block text-lg text-gray-700">標題</label>
                        <input v-model="article.title" id="title" type="text" name="title" placeholder ="標題" class="input-style">

                        <div v-if="errors" class="text-red-600 mt-2 text-sm">
                            <p v-for="error in res.title">{{error}}</p>
                        </div>
                    </div>

                    <div class ="">
                        <label for="url" class="block text-lg text-gray-700">封面</label>
                        <input v-model="article.url" id="url" name="url" placeholder ="圖片url" class="input-style">

                        <div v-if="errors" class="text-red-600 mt-2 text-sm">
                            <p v-for="error in res.url">{{error}}</p>
                        </div>
                    </div>

                    <div class ="">
                        <label class="block text-lg text-gray-700">內容</label>
                        <ckeditor :editor="editor" v-model="article.content" @ready="onReady"></ckeditor>

                        <div v-if="errors" class="text-red-600 mt-2 text-sm">
                            <p v-for="error in res.content">{{error}}</p>
                        </div>
                    </div>

                    <div class="">
                        <label for="tags" class="block text-lg text-gray-700">標籤</label>
                        <select v-model="article.tags" id="tags" size="10" multiple class="w-1/5 input-style">
                            <option v-for="tag in tagList" :value="tag.id">{{tag.name}}</option>
                        </select>
                    </div>

                </div>

                <div class="flex justify-between items-end p-5">
                    <select v-model="article.state" class="p-3 rounded-md border-2 hover:border-black" name="state">
                        <option value="published">發布</option>
                        <option value="draft">草稿</option>
                    </select>

                    <div v-if="errors" class="text-red-600 mt-2 text-sm">
                        <p v-for="error in res.state">{{error}}</p>
                    </div>

                    <button @click="updateArticle" class="rounded-md p-3 bg-blue-500 text-white hover:bg-blue-600">更新文章</button>
                </div>

            </div>

        </div>
    </transition>
</template>

<script>
    import DecoupledEditor from "@ckeditor/ckeditor5-build-decoupled-document";
    import {ref , onBeforeMount} from "vue";
    import {useRoute, useRouter} from "vue-router";
    import {apiGetArticle, apiUpdateArticle} from "../../api/article";
    import {apiGetTags} from "../../api/tag";
    import {useStore} from 'vuex';

    export default {
        data() {
            return {
                editor: DecoupledEditor,
            };
        },
        setup(){
            const article = ref({
                id:null,
                title:'',
                content:'',
                url:'',
                tags:[],
                state:''
            });
            const tagList = ref([]);
            const isShow = ref(false);
            const route = useRoute()
            const articleId = route.params.id;
            const getData = async ()=>{
                await Promise.all([apiGetArticle(articleId), apiGetTags()])
                    .then((results) => {
                        article.value = results[0].data;
                        tagList.value = results[1].data;
                        isShow.value = true;
                    });
            }
            onBeforeMount(getData);

            const errors = ref(false);
            const res = ref({
                title:[],
                content:[],
                url:[],
                state:[],
            });
            const router = useRouter();
            const store = useStore();
            const updateArticle = async () => {
                await Promise.all([apiUpdateArticle(articleId,article.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){
                            res.value = results[0].data.data;
                        }else{
                            store.dispatch('addNotice',{name:'提醒',message:'文章更新成功!'});
                            router.push({name:'articlesManager'});
                        }
                    });
            }

            function onReady(editor)  {
                // Insert the toolbar before the editable area.
                editor.ui.getEditableElement().parentElement.insertBefore(
                    editor.ui.view.toolbar.element,
                    editor.ui.getEditableElement()
                );
            }

            return {
                article,
                tagList,
                isShow,
                res,
                errors,
                updateArticle,
                onReady,
            }
        }
    }
</script>
