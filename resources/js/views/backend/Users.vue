<template>
    <manage-layout
        :data="response"
        :link="link"
        :is-show="isShow"
        :search="true"
        :paginate="true"
    >
        <users-list
            :users="users"
            :refresh-users="getUsers"
        >
        </users-list>
        <p v-if="users.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到文章!
        </p>
    </manage-layout>
</template>

<script>
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetUsers} from "../../api/users";
import UsersList from "../users/UsersList";
import ManageLayout from "../layouts/ManageLayout";

export default {
    components: {
        UsersList,
        ManageLayout
    },
    setup() {
        const route = useRoute();
        const link = ref('usersManage');
        const users = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getUsers = async () => {
            isShow.value = false;
            await apiGetUsers(params.value)
                .then((res) => {
                    users.value = res.data.data
                    response.value = res.data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getUsers);
        watch(params, getUsers);

        return {
            link,
            users,
            response,
            isShow,
            getUsers
        }
    }
}
</script>
