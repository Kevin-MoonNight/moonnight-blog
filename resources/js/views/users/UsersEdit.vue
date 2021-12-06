<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <base-label html-for="name">名稱</base-label>

                    <base-input-text
                        v-model:value="user.name"
                        name="name"
                        placeholder="名稱"
                    >
                    </base-input-text>
                </div>
                <div class="mt-4 w-full">
                    <base-label html-for="username">帳號</base-label>

                    <base-input-text
                        v-model:value="user.username"
                        name="username"
                        placeholder="帳號"
                    >
                    </base-input-text>
                </div>
                <div class="mt-4 w-full">
                    <base-label html-for="email">電子信箱</base-label>

                    <base-input-text
                        v-model:value="user.email"
                        name="email"
                        placeholder="電子信箱"
                    >
                    </base-input-text>
                </div>

                <div class="flex justify-end mt-4 w-full">
                    <base-button @click="updateUser">
                        更新資料
                    </base-button>
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
import BaseButton from "../components/BaseButton";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";

export default {
    components: {
        BaseInputText,
        BaseLabel,
        BaseButton
    },
    setup() {
        const store = useStore();
        const router = useRouter();
        const route = useRoute()
        const id = route.params.id;

        const user = ref({
            name: '',
            username: '',
            email: ''
        });
        const isShow = ref(false);

        onBeforeMount(async () => {
            await apiGetUser(id)
                .then((res) => {
                    user.value = res.data;
                    isShow.value = true;
                });
        });

        const updateUser = async () => {
            await apiUpdateUser(id, user.value)
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

