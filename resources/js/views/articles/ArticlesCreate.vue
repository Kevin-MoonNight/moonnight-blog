<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="p-5">
            <div class="w-full">
                <base-label htmlFor="title">標題</base-label>

                <base-input-text
                    v-model:value="article.title"
                    name="title"
                    placeholder="標題"
                ></base-input-text>
            </div>

            <div class="mt-4 w-full">
                <base-label htmlFor="slug">slug</base-label>

                <base-input-text
                    v-model:value="article.slug"
                    name="slug"
                    placeholder="slug"
                ></base-input-text>
            </div>

            <div class="mt-4 w-full">
                <base-label htmlFor="thumbnail">縮圖</base-label>

                <div class="flex">
                    <input type="file" @change="getThumbnail($event)"
                           id="thumbnail"
                           name="thumbnail"
                           placeholder="縮圖">

                    <img v-if="thumbnailSrc !== null"
                         v-bind:src="thumbnailSrc"
                         alt="縮圖"
                         class="w-auto h-24"
                    >
                </div>
            </div>

            <div class="mt-4 w-full">
                <base-label htmlFor="slug">摘要</base-label>

                <base-input-text
                    v-model:value="article.excerpt"
                    name="excerpt"
                    placeholder="摘要"
                ></base-input-text>
            </div>

            <div class="mt-4 w-full">
                <base-label htmlFor="content">內容</base-label>

                <editor v-model="article.content"></editor>
            </div>

            <div class="mt-4 w-full">
                <base-label htmlFor="tags">標籤</base-label>

                <base-select
                    v-model:value="article.tags"
                    name="tags"
                    :multiple="true"
                >
                    <option v-for="tag in tags" :value="tag.id" :key="tag.slug">
                        {{ tag.name }}
                    </option>
                </base-select>
            </div>

            <div class="flex justify-between mt-4 w-full">
                <base-select
                    v-model:value="article.state"
                    name="state"
                >
                    <option value="1">發布</option>
                    <option value="0">草稿</option>
                </base-select>

                <base-button @click="createArticle">新增文章</base-button>
            </div>
        </div>
    </div>
</template>

<script>
import {onBeforeMount, reactive, ref} from "vue";
import {useStore} from "vuex";
import {useRouter} from "vue-router";
import {apiCreateArticle} from "../../api/article";
import {apiGetTags} from "../../api/tag";
import {transformToFormData} from "../../api/utils";
import Editor from "../components/Editor";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";
import BaseButton from "../components/BaseButton";
import BaseSelect from "../components/BaseSelect";

export default {
    components: {
        BaseSelect,
        BaseButton,
        BaseInputText,
        BaseLabel,
        Editor
    },
    setup() {
        const article = reactive({
            title: '',
            slug: '',
            excerpt: '',
            content: '',
            thumbnail: null,
            tags: [],
            state: 0
        });
        const tags = ref([]);

        onBeforeMount(async () => {
            await apiGetTags()
                .then((res) => {
                    tags.value = res.data;
                });
        });

        const thumbnailSrc = ref(null);
        const getThumbnail = (event) => {
            const reader = new FileReader();

            reader.onloadend = function () {
                thumbnailSrc.value = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);

            article.thumbnail = event.target.files[0]
        }

        const router = useRouter();
        const store = useStore();
        const createArticle = async () => {
            await apiCreateArticle(transformToFormData(article))
                .then(() => {
                    store.dispatch('addNotice', {message: '文章新增成功!', color: true});
                    router.push({name: 'articlesManage'});
                });
        };

        return {
            tags,
            article,
            thumbnailSrc,
            createArticle,
            getThumbnail
        }
    }
}
</script>
