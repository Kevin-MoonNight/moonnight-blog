<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <th class="py-2 border-r">名稱</th>
            <th class="py-2 border-r">帳號</th>
            <th class="py-2 border-r">電子信箱</th>
            <th class="py-2 border-r">權限</th>
            <th class="py-2">動作</th>
        </tr>
        </thead>
        <transition name="fade">
            <tbody v-show="isShow">
            <tr v-for="user in users" class="h-14 border-b group hover:bg-blueGray-200">
                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ user.name }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ user.username }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ user.email }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ user.is_admin }}
                </td>

                <td class="flex justify-around px-2 h-14 text-center min-w-32">
                    <button @click="editUser(user.id)" class="hover:text-indigo-500" title="編輯使用者">
                        <i class="far fa-edit"></i>
                    </button>

                    <button @click="deleteUser(user.id)" class="hover:text-indigo-500" title="刪除使用者">
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
import {apiDeleteUser} from "../../api/users";

export default {
    props: {
        users: {
            type: Object
        },
        refreshUsers: {
            type: Function
        },
        isShow: {
            type: Boolean
        }
    },
    setup(props) {
        const {refreshArticles} = toRefs(props)
        const store = useStore();
        const router = useRouter();

        const editUser = (id) => {
            router.push({name: 'usersEdit', params: {id: id}});
        }
        const deleteUser = async (id) => {
            await Promise.all([apiDeleteUser(id)])
                .then(() => {
                    store.dispatch('addNotice', {message: '使用者刪除成功!', color: true});
                    refreshArticles.value();
                });
        }

        function date(create_at) {
            return moment(create_at).format('YYYY-MM-DD');
        }

        return {
            editUser,
            deleteUser,
            date,
        }
    }
}
</script>
