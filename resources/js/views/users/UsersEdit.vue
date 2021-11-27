<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <label htmlFor="name"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        名稱
                    </label>
                    <input v-model="user.name" id="name" type="text" name="name" placeholder="名稱"
                           class="input-style">
                </div>
                <div class="mt-4 w-full">
                    <label htmlFor="username"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        帳號
                    </label>
                    <input v-model="user.username" id="username" type="text" name="username" placeholder="帳號"
                           class="input-style">
                </div>
                <div class="mt-4 w-full">
                    <label htmlFor="email"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        電子信箱
                    </label>
                    <input v-model="user.email" id="email" type="email" name="email" placeholder="電子信箱"
                           class="input-style">
                </div>

                <div class="flex justify-end mt-4 w-full">
                    <button @click="updateUser"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        更新資料
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiGetUser, apiUpdateUser} from "../../api/users";

export default {
    setup() {
        const store = useStore();
        const router = useRouter();
        const route = useRoute()
        const userId = route.params.id;

        const user = ref({
            name: '',
            username: '',
            email: ''
        });
        const isShow = ref(false);

        const getData = async () => {
            await Promise.all([apiGetUser(userId)])
                .then((results) => {
                    user.value = results[0].data;
                    isShow.value = true;
                });
        }
        onBeforeMount(getData);

        const updateUser = async () => {
            await Promise.all([apiUpdateUser(userId, user.value)])
                .then(() => {
                    store.dispatch('addNotice', {message: '使用者資料更新成功!', color: true});
                    router.push({name: 'usersManage'});
                });
        };

        return {
            user,
            isShow,
            updateUser
        }
    }
}
</script>

