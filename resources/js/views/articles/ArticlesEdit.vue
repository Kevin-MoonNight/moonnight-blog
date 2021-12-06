<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
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
                    <base-label htmlFor="excerpt">摘要</base-label>

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

                    <base-button @click="updateArticle">更新文章</base-button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {apiGetArticle, apiUpdateArticle} from "../../api/article";
import {apiGetTags} from "../../api/tag";
import {useStore} from "vuex";
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
        const route = useRoute()
        const slug = route.params.slug;

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

        onBeforeMount(async () => {
            await Promise.all([apiGetArticle(slug), apiGetTags()])
                .then((res) => {
                    article.value = res[0].data;
                    thumbnailSrc.value = article.value.thumbnail;
                    article.value.thumbnail = null;
                    article.value.tags = article.value.tags.map(tag => tag.id);

                    tags.value = res[1].data;
                    isShow.value = true;
                });
        });

        const getThumbnail = (event) => {
            const reader = new FileReader();

            reader.onloadend = function () {
                thumbnailSrc.value = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);

            article.value.thumbnail = event.target.files[0]
        }

        const router = useRouter();
        const store = useStore();
        const updateArticle = async () => {
            await apiUpdateArticle(slug, transformToFormData(article.value))
                .then(() => {
                    store.dispatch('addNotice', {message: '文章更新成功!', color: true});
                    router.push({name: 'articlesManage'});
                });
        };

        return {
            article,
            thumbnailSrc,
            tags,
            isShow,
            updateArticle,
            getThumbnail
        }
    }
}
</script>

