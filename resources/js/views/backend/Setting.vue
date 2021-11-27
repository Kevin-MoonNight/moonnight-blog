<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="grid grid-cols-1 gap-5 p-5 w-full h-full md:grid-cols-4">
                <div class="object-contain col-span-1">
                    <img :src="user.profile_photo_url" alt="無法顯示圖片"
                         class="w-full h-auto">
                </div>
                <div class="col-span-1 md:col-span-2">
                    <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                        名稱：{{ user.name }}
                    </div>
                    <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                        帳號：{{ user.username }}
                    </div>
                    <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                        電子信箱：{{ user.email }}
                    </div>
                    <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                        權限：{{ user.is_admin }}
                    </div>
                </div>
                <div class="col-span-1">
                    <button @click="toUserEdit"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        更新資料
                    </button>
                    <button @click="toUserEditPassword"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        更新密碼
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>


<script>
import {onBeforeMount, ref} from "vue";
import {useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiGetUser} from "../../api/users";

export default {
    setup() {
        const store = useStore();
        const router = useRouter();
        const user = ref({
            id: 0,
            name: '',
            username: '',
            email: '',
            profile_photo_url: '',
            is_admin: 0,
        });
        const isShow = ref(false);

        const getData = async () => {
            await Promise.all([apiGetUser(store.state.auth.user.id)])
                .then((results) => {
                    user.value = results[0].data;
                    isShow.value = true;
                });
        }
        onBeforeMount(getData);

        const toUserEdit = () => {
            router.push({name: 'usersEdit', params: {id: user.value.id}});
        }
        const toUserEditPassword = () => {
            router.push({name: 'usersEditPassword', params: {id: user.value.id}});
        }

        return {
            user,
            isShow,
            toUserEdit,
            toUserEditPassword
        }
    }
}
</script>

