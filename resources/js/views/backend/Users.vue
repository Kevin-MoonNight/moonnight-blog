<template>
    <search-box :link="'usersManage'"></search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <users-list
                v-if="isShow"
                :users="users"
                :refresh-users="getUsers"
                :is-show="isShow">
            </users-list>
            <p v-if="users.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
                找不到文章!
            </p>
        </div>
    </div>

    <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="response" :link="'usersManage'"></paginator>
    </div>
</template>

<script>
import UsersList from "../users/UsersList";
import paginator from "../components/Paginator";
import SearchBox from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";
import {useRoute} from "vue-router";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetUsers} from "../../api/users";

export default {
    components: {
        UsersList,
        LoadingIcon,
        SearchBox,
        paginator
    },
    setup() {
        const route = useRoute();
        const users = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getUsers = async () => {
            isShow.value = false;
            await Promise.all([apiGetUsers(params.value)])
                .then((results) => {
                    users.value = results[0].data.data
                    response.value = results[0].data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getUsers);
        watch(params, getUsers);

        return {
            users,
            response,
            isShow,
            getUsers
        }
    }
}
</script>
