<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto pb-10">
            <div class="w-full h-auto bg-white rounded-md">
                <div class="p-5 space-y-5 mb-10">
                    <div class ="">
                        <label for="title" class="block text-lg text-gray-700">標題</label>
                        <input v-model="article.title" id="title" type="text" name="title" placeholder ="標題" class="input-style">

                        <p v-for="error in errors.title"
                           class="text-red-600 mt-2 text-sm"
                        >{{error}}</p>
                    </div>

                    <div class ="">
                        <label for="thumbnail" class="block text-lg text-gray-700">縮圖</label>
                        <input type="file" @change="previewFiles($event)" id="thumbnail" name="thumbnail" placeholder ="縮圖">

                        <p v-for="error in errors.thumbnail"
                           class="text-red-600 mt-2 text-sm"
                        >{{error}}</p>
                    </div>

                    <div class ="">
                        <label class="block text-lg text-gray-700">內容</label>
                        <ckeditor :editor="editor" v-model="article.content" @ready="onReady"></ckeditor>

                        <p v-for="error in errors.content"
                           class="text-red-600 mt-2 text-sm"
                        >{{error}}</p>
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
                        <option value="1">發布</option>
                        <option value="0">草稿</option>
                    </select>


                    <p v-for="error in errors.state"
                       class="text-red-600 mt-2 text-sm"
                    >{{error}}</p>

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
            let data = new FormData();
            const article = ref({
                title:'test1',
                content:'test',
                thumbnail:null,
                tags:[],
                state:0
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

            const errors = ref({
                title:[],
                content:[],
                thumbnail:[],
                state:[],
            });
            const router = useRouter();
            const store = useStore();
            const updateArticle = async () => {
                data.append('title',article.value.title);
                data.append('content',article.value.content);

                for (let i = 0; i < article.value.tags.length; i++) {
                    data.append('tags[]', article.value.tags[i]);
                }

                data.append('state', article.value.state);
                await Promise.all([apiUpdateArticle(articleId,data)])
                    .then((response) => {
                        console.log(response);
                        store.dispatch('addNotice',{name:'提醒',message:'文章更新成功!'});
                        router.push({name:'articlesManager'});
                    }).catch((e)=>{
                        errors.value = e.response.data;
                        console.log(e.response.data);
                    });
            }
            function previewFiles(event) {
                data.append('thumbnail', event.target.files[0]);
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
                errors,
                previewFiles,
                updateArticle,
                onReady,
            }
        }
    }
</script>
