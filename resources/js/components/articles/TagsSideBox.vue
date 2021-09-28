<template>
    <transition name="fade">
        <side-box v-show="isShow" :name="'所有標籤'">
            <p v-for="tag in tags" :key="'TagsSideBox ' + tag.id" @click="queryTag(tag.name)"
               class="w-auto px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm cursor-pointer">

                {{ tag.name }}
            </p>
        </side-box>
    </transition>
</template>
<script>
    import SideBox from "../shared/SideBox";
    import {apiGetTags} from "../../api/tag";
    import {ref, onBeforeMount} from "vue";
    import {useRouter} from "vue-router";

    export default {
        components:{
            SideBox,
        },
        setup(){
            const tags = ref([]);
            const isShow = ref(false);
            onBeforeMount(async () => {
                isShow.value = false;
                await Promise.all([apiGetTags()])
                    .then((results) => {
                        tags.value = results[0].data;
                        isShow.value = true;
                    });
            })

            const router = useRouter();
            //搜尋擁有該標籤的文章
            const queryTag = (tag) => {
                router.push({name:'articles',query:{tag:tag}})
            }

            return {
                tags,
                isShow,
                queryTag
            }
        }
    }
</script>
