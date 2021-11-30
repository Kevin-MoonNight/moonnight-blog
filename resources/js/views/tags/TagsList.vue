<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <th class="py-2 border-r">名稱</th>
            <th class="py-2">動作</th>
        </tr>
        </thead>
        <transition name="fade">
            <tbody v-show="isShow">
            <tr v-for="tag in tags" class="h-14 border-b group hover:bg-blueGray-200">
                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ tag.name }}
                </td>

                <td class="flex justify-around px-2 h-14 min-w-32">
                    <button @click="editTag(tag.slug)" class="hover:text-indigo-500" title="編輯標籤">
                        <i class="far fa-edit"></i>
                    </button>

                    <button @click="deleteTag(tag.slug)" class="hover:text-indigo-500" title="刪除標籤">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </transition>
    </table>
</template>

<script>
import moment from "moment";
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import {useStore} from "vuex";
import {apiDeleteTag} from "../../api/tag";

export default {
    props: {
        tags: {
            type: Object
        },
        refreshTags: {
            type: Function
        },
        isShow: {
            type: Boolean
        }
    },
    setup(props) {
        const {refreshTags} = toRefs(props)

        const router = useRouter();

        function editTag(slug) {
            router.push({name: 'tagsEdit', params: {slug: slug}});
        }

        const store = useStore();
        const deleteTag = async (slug) => {
            await Promise.all([apiDeleteTag(slug)])
                .then(() => {
                    store.dispatch('addNotice', {message: '標籤刪除成功!', color: true});
                    refreshTags.value();
                });
        }

        function date(create_at) {
            return moment(create_at).format('YYYY-MM-DD');
        }

        return {
            editTag,
            deleteTag,
            date,
        }
    }
}
</script>
