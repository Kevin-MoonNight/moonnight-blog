<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <base-label html-for="name">名稱</base-label>

                    <base-input-text
                        v-model:value="tag.name"
                        name="name"
                        placeholder="名稱"
                    >
                    </base-input-text>
                </div>
                <div class="mt-4 w-full">
                    <base-label html-for="slug">slug</base-label>

                    <base-input-text
                        v-model:value="tag.slug"
                        name="slug"
                        placeholder="slug"
                    >
                    </base-input-text>
                </div>

                <div class="flex justify-end mt-4 w-full">
                    <base-button @click="updateTag">更新標籤</base-button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {apiUpdateTag} from "../../api/tag";
import {apiGetTag} from "../../api/tag";
import {useStore} from "vuex";
import BaseButton from "../components/BaseButton";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";

export default {
    components: {
        BaseInputText,
        BaseLabel,
        BaseButton
    },
    setup() {
        const route = useRoute()
        const slug = route.params.slug;
        const tag = ref({
            name: '',
            slug: ''
        });
        const isShow = ref(false);
        onBeforeMount(async () => {
            await apiGetTag(slug)
                .then((res) => {
                    tag.value = res.data;
                    isShow.value = true;
                });
        });

        const router = useRouter();
        const store = useStore();
        const updateTag = async () => {
            await apiUpdateTag(slug, tag.value)
                .then(() => {
                    store.dispatch('addNotice', {message: '標籤更新成功!', color: true});
                    router.push({name: 'tagsManage'});
                });
        };

        return {
            tag,
            isShow,
            updateTag
        }
    }
}
</script>

