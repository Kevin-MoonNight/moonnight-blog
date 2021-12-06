<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="p-5">
            <div class="w-full">
                <base-label html-for="password">密碼</base-label>

                <base-input-text
                    v-model:value="password.password"
                    type="password"
                    name="password"
                    placeholder="密碼"
                >
                </base-input-text>
            </div>
            <div class="mt-4 w-full">
                <base-label html-for="password_confirmation">確認密碼</base-label>

                <base-input-text
                    v-model:value="password.password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="確認密碼"
                >
                </base-input-text>
            </div>

            <div class="flex justify-end mt-4 w-full">
                <base-button @click="updatePassword">
                    更新密碼
                </base-button>
            </div>
        </div>
    </div>
</template>


<script>
import {reactive} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useStore} from "vuex";
import {apiUpdateUserPassword} from "../../api/users";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";
import BaseButton from "../components/BaseButton";

export default {
    components: {
        BaseButton,
        BaseInputText,
        BaseLabel
    },
    setup() {
        const store = useStore();
        const router = useRouter();
        const route = useRoute()
        const id = route.params.id;

        const password = reactive({
            password: '',
            password_confirmation: ''
        });
        const updatePassword = async () => {
            await apiUpdateUserPassword(id, password)
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

