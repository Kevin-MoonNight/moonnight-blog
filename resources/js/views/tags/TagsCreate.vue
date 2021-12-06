<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
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
                <base-button @click="createTag">新增標籤</base-button>
            </div>
        </div>
    </div>
</template>

<script>
import {reactive} from "vue";
import {useRouter} from "vue-router";
import {apiCreateTag} from "../../api/tag";
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
        const tag = reactive({
            name: '',
            slug: ''
        });

        const router = useRouter();
        const store = useStore();
        const createTag = async () => {
            await apiCreateTag(tag)
                .then(() => {
                    store.dispatch('addNotice', {message: '標籤新增成功!', color: true});
                    router.push({name: 'tagsManage'});
                });
        };

        return {
            tag,
            createTag
        }
    }
}
</script>
