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
                    <div class="flex">
                        <input type="file" @change="getThumbnail($event)" id="thumbnail" name="thumbnail"
                               placeholder="縮圖">
                        <img v-if="thumbnailSrc !== null" v-bind:src="thumbnailSrc" alt=""
                             class="w-auto h-24">
                    </div>
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
                    <editor v-model="article.content"></editor>
                </div>

                <div class="mt-4 w-full">
                    <label htmlFor="tags"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        標籤
                    </label>
                    <select v-model="article.tags" id="tags" multiple class="input-style">
                        <option v-for="tag in tags" :value="tag.id" :key="tag.slug">
                            {{ tag.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-between mt-4 w-full">
                    <select v-model="article.state"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none"
                            name="state">
                        <option value="1">發布</option>
                        <option value="0">草稿</option>
                    </select>

                    <button @click="createArticle"
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
import {useRouter} from "vue-router";
import {apiCreateArticle} from "../../api/article";
import {apiGetTags} from "../../api/tag";
import {useStore} from "vuex";
import Editor from "../components/Editor";

export default {
    components: {
        Editor
    },
    setup() {
        const article = ref({
            title: '',
            slug: '',
            excerpt: '',
            content: '',
            thumbnail: null,
            tags: [],
            state: 0
        });
        const thumbnailSrc = ref(null);
        const tags = ref([]);
        const isShow = ref(false);

        const getTags = async () => {
            await Promise.all([apiGetTags()])
                .then((results) => {
                    tags.value = results[0].data;
                    isShow.value = true;
                });
        }
        onBeforeMount(getTags);

        const getThumbnail = (event) => {
            const reader = new FileReader();

            reader.onloadend = function () {
                thumbnailSrc.value = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);

            article.value.thumbnail = event.target.files[0]
        }
        const inputData = () => {
            const data = new FormData();

            Object.keys(article.value).forEach((key) => {
                if (key !== 'tags') {
                    data.append(key, article.value[key])
                }
            });

            for (let i = 0; i < article.value.tags.length; i++) {
                data.append('tags[]', article.value.tags[i]);
            }

            return data;
        }

        const router = useRouter();
        const store = useStore();
        const createArticle = async () => {
            await Promise.all([apiCreateArticle(inputData())])
                .then(() => {
                    store.dispatch('addNotice', {message: '文章新增成功!', color: true});
                    router.push({name: 'articlesManage'});
                });
        };

        return {
            article,
            thumbnailSrc,
            tags,
            isShow,
            createArticle,
            getThumbnail
        }
    }
}
</script>
