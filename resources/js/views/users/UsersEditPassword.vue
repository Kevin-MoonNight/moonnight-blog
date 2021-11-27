<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="p-5">
            <div class="w-full">
                <label htmlFor="password"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    密碼
                </label>
                <input v-model="password.password" id="password" type="password" name="password" placeholder="密碼"
                       class="input-style">
            </div>
            <div class="mt-4 w-full">
                <label htmlFor="password_confirmation"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    確認密碼
                </label>
                <input v-model="password.password_confirmation" id="password_confirmation" type="password"
                       name="password_confirmation" placeholder="確認密碼"
                       class="input-style">
            </div>

            <div class="flex justify-end mt-4 w-full">
                <button @click="updatePassword"
                        class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                    更新密碼
                </button>
            </div>
        </div>
    </div>
</template>


<script>
import {ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiUpdateUserPassword} from "../../api/users";

export default {
    setup() {
        const store = useStore();
        const router = useRouter();
        const route = useRoute()
        const userId = route.params.id;

        const password = ref({
            password: '',
            password_confirmation: ''
        });
        const updatePassword = async () => {
            await Promise.all([apiUpdateUserPassword(userId, password.value)])
                .then(() => {
                    store.dispatch('addNotice', {message: '密碼更新成功!', color: true});
                    router.push({name: 'usersManage'});
                });
        };

        return {
            password,
            updatePassword
        }
    }
}
</script>

