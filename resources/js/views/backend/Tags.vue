<template>
    <manage-layout
        :link="link"
        :is-show="isShow"
        :search="true"
    >
        <tags-list
            :tags="tags"
            :refresh-tags="getTags"
        >
        </tags-list>
        <p v-if="tags.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到標籤!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetTags} from "../../api/tag";
import ManageLayout from "../layouts/ManageLayout";
import TagsList from "../tags/TagsList";

export default {
    components: {
        ManageLayout,
        TagsList
    },
    setup() {
        const route = useRoute();
        const link = ref('tagsManage');
        const tags = ref([]);
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getTags = async () => {
            isShow.value = false;
            await apiGetTags(params.value)
                .then((res) => {
                    tags.value = res.data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getTags);
        watch(params, getTags);

        return {
            link,
            tags,
            isShow,
            getTags
        }
    }
}
</script>
