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

                    <button @click="addArticle" class="rounded-md p-3 bg-blue-500 text-white hover:bg-blue-600">新增文章</button>
                </div>

            </div>

        </div>
    </transition>
</template>

<script>
    import {onBeforeMount, ref} from "vue";
    import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';
    import {useRouter} from "vue-router";
    import {apiCreateArticle} from "../../api/article";
    import {apiGetTags} from "../../api/tag";
    import {useStore} from "vuex";

    export default {
        data() {
            return {
                editor: DecoupledEditor,
            };
        },
        setup(){
            const tagList = ref([]);
            const isShow = ref(false);
            const getData = async ()=>{
                await Promise.all([apiGetTags()])
                    .then((results) => {
                        tagList.value = results[0].data;
                        isShow.value = true;
                    });
            }

            onBeforeMount(getData);

            const article = ref({
                title:'test1',
                content:'test',
                url:'https://images.unsplash.com/photo-1516259762381-22954d7d3ad2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80',
                tags:[],
                state:'draft'
            });

            const errors = ref(false);
            const res = ref({
                title:[],
                content:[],
                url:[],
                state:[],
            });
            const router = useRouter();
            const store = useStore();
            const addArticle = async () => {
                await Promise.all([apiCreateArticle(article.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){
                            res.value = results[0].data.data;
                        }else{
                            store.dispatch('addNotice',{name:'提醒',message:'文章新增成功!'});
                            router.push({name:'articlesManager'});
                        }
                    });
            };


            function onReady(editor)  {
                // Insert the toolbar before the editable area.
                editor.ui.getEditableElement().parentElement.insertBefore(
                    editor.ui.view.toolbar.element,
                    editor.ui.getEditableElement()
                );
            }

            return {
                article,
                addArticle,
                tagList,
                res,
                onReady,
                isShow,
                errors
            }
        }
    }
</script>
