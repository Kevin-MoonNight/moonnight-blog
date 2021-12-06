<template>
    <table-layout>
        <template v-slot:header>
            <th class="py-2 border-r">名稱</th>
            <th class="py-2 border-r">電子信箱</th>
            <th class="py-2 border-r">訊息</th>
            <th class="py-2 border-r">案件類型</th>
            <th class="py-2 border-r">時間</th>
            <th class="py-2">動作</th>
        </template>

        <template v-slot:body>
            <tr v-for="message in messages" class="h-14 border-b group hover:bg-blueGray-200">
                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ message.name }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ message.email }}
                </td>

                <td class="px-2 h-14 min-w-32 group-hover:text-indigo-500">
                    {{ message.remark }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ message.caseType }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ date(message.created_at) }}
                </td>

                <td class="flex justify-around px-2 h-14 min-w-32">
                    <button @click="editMessage(message.id)" class="hover:text-indigo-500" title="編輯訊息">
                        <i class="far fa-edit"></i>
                    </button>

                    <button @click="deleteMessage(message.id)" class="hover:text-indigo-500" title="刪除訊息">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        </template>
    </table-layout>
</template>

<script>
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import {useStore} from "vuex";
import {apiDeleteMessage} from "../../api/message";
import {date} from "../../api/time";
import TableLayout from "../layouts/TableLayout";

export default {
    components: {TableLayout},
    props: {
        messages: {
            type: Object,
            required: true
        },
        refreshMessages: {
            type: Function,
            required: true
        }
    },
    setup(props) {
        const {refreshMessages} = toRefs(props)

        const router = useRouter();

        function editMessage(id) {
            router.push({name: 'messagesEdit', params: {id: id}});
        }

        const store = useStore();
        const deleteMessage = async (id) => {
            await apiDeleteMessage(id)
                .then(() => {
                    store.dispatch('addNotice', {message: '訊息刪除成功!', color: true});
                    refreshMessages.value();
                });
        }

        return {
            editMessage,
            deleteMessage,
            date: date
        }
    }
}
</script>
