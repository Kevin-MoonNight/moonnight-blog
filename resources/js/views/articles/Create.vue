<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <label htmlFor="title"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        標題
                    </label>
                    <input v-model="article.title" id="title" type="text" name="title" placeholder="標題"
                           class="input-style">
                </div>
                <div class="mt-4 w-full">
                    <label htmlFor="slug"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        slug
                    </label>
                    <input v-model="article.slug" id="slug" type="text" name="title" placeholder="slug"
                           class="input-style">
                </div>
                <div class="mt-4 w-full">
                    <label htmlFor="thumbnail"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        縮圖
                    </label>
                    <input type="file" @change="previewFiles($event)" id="thumbnail" name="thumbnail"
                           placeholder="縮圖">
                </div>

                <div class="mt-4 w-full">
                    <label htmlFor="excerpt"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        摘要
                    </label>
                    <input v-model="article.excerpt" id="excerpt" type="text" name="title" placeholder="摘要"
                           class="input-style">
                </div>

                <div class="mt-4 w-full">
                    <label class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">內容</label>
                    <ckeditor :editor="editor" v-model="article.content" @ready="onReady"></ckeditor>
                </div>

                <div class="mt-4 w-full">
                    <label htmlFor="tags"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        標籤
                    </label>
                    <select v-model="article.tags" id="tags" size="10" multiple class="input-style">
                        <option v-for="tag in tags" :value="tag.id">{{ tag.name }}</option>
                    </select>
                </div>

                <div class="flex justify-between mt-4 w-full">
                    <select v-model="article.state"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none"
                            name="state">
                        <option value="1">發布</option>
                        <option value="0">草稿</option>
                    </select>

                    <button @click="addArticle"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        新增文章
                    </button>
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
    setup() {
        const tags = ref([]);
        const isShow = ref(false);
        const getData = async () => {
            await Promise.all([apiGetTags()])
                .then((results) => {
                    tags.value = results[0].data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getData);
        let data = new FormData();
        const article = ref({
            title: 'test1',
            slug: 'test1',
            excerpt: 'test article',
            content: 'test test test test',
            thumbnail: null,
            tags: [],
            state: 0
        });

        const router = useRouter();
        const store = useStore();
        const addArticle = async () => {
            //todo 改善data.append 用foreach實現
            data.append('title', article.value.title);
            data.append('slug', article.value.slug);
            data.append('excerpt', article.value.excerpt);
            data.append('content', article.value.content);
            for (let i = 0; i < article.value.tags.length; i++) {
                data.append('tags[]', article.value.tags[i]);
            }

            data.append('state', article.value.state);
            await Promise.all([apiCreateArticle(data)])
                .then((response) => {
                    store.dispatch('addNotice', {message: '文章新增成功!', color: true});
                    router.push({name: 'managesArticle'});
                });
        };

        function previewFiles(event) {
            data.append('thumbnail', event.target.files[0]);
        }

        function onReady(editor) {
            // Insert the toolbar before the editable area.
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        }

        return {
            article,
            addArticle,
            tags,
            onReady,
            isShow,
            previewFiles
        }
    }
}
</script>
