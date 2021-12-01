<template>
    <search-box :link="'tagsManage'"></search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <tags-list
                v-if="isShow"
                :tags="tags"
                :refresh-tags="getTags"
                :is-show="isShow">
            </tags-list>
            <p v-if="tags.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
                找不到標籤!
            </p>
        </div>
    </div>
</template>

<script>
import TagsList from "../tags/TagsList";
import paginator from "../components/Paginator";
import SearchBox from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetTags} from "../../api/tag";

export default {
    components: {
        LoadingIcon,
        SearchBox,
        paginator,
        TagsList
    },
    setup() {
        const route = useRoute();
        const tags = ref([]);
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getTags = async () => {
            isShow.value = false;
            await Promise.all([apiGetTags(params.value)])
                .then((results) => {
                    tags.value = results[0].data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getTags);
        watch(params, getTags);

        return {
            tags,
            isShow,
            getTags
        }
    }
}
</script>
