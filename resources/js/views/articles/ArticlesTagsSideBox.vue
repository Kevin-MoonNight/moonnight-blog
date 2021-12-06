<template>
    <side-box :name="'所有標籤'" :is-show="isShow">
        <p v-for="tag in tags" :key="'TagsSideBox ' + tag.slug" @click="queryTag(tag.slug)"
           class="px-4 py-1 w-auto text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:text-indigo-500 hover:bg-blueGray-300">
            {{ tag.name }}
        </p>
    </side-box>
</template>
<script>
import SideBox from "../components/SideBox";
import {apiGetTags} from "../../api/tag";
import {ref, onBeforeMount} from "vue";
import {useRouter} from "vue-router";
import LoadingIcon from "../components/LoadingIcon";

export default {
    components: {
        LoadingIcon,
        SideBox,
    },
    setup() {
        const tags = ref([]);
        const isShow = ref(false);
        onBeforeMount(async () => {
            await apiGetTags()
                .then((res) => {
                    tags.value = res.data;
                    isShow.value = true;
                });
        })

        const router = useRouter();
        //搜尋擁有該標籤的文章
        const queryTag = (slug) => {
            router.push({name: 'articles', query: {tag: slug}})
        }

        return {
            tags,
            isShow,
            queryTag
        }
    }
}
</script>
