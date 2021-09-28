<template>
    <div class="section">
        <div class="bg-white shadow-xl overflow-hidden sm:rounded-md p-10">
            <h1 class="text-2xl mb-10">登入</h1>

            <div class="mt-4">
                <label for="email">Email</label>
                <input v-model="email" id="email" class="input-style" type="email" name="email" required autofocus />
            </div>

            <div class="mt-4">
                <label for="password">密碼</label>
                <input v-model="password" id="password" class="input-style" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">記得我?不會的</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 py-5">

                <a class="underline text-sm text-gray-600 hover:text-gray-900" >
                    忘記密碼了?哈哈
                </a>

                <div class="px-4 py-3 text-right sm:px-6">
                    <button @click="login" class="inline-flex justify-center py-2 px-4 border-2 border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">登入</button>
                </div>
            </div>

            <div class="bg-red-200 p-10 text-md rounded-md">
                還沒有帳號嗎? 不過現在無法註冊唷(´∀`)
            </div>
        </div>
    </div>
</template>

<script>
    import { ref } from "vue";
    import { useRouter } from "vue-router";
    import { useStore } from 'vuex'
    import { apiLogin } from "../../api/auth";

    export default {
        setup(){
            const email = ref('123456@example.com');
            const password = ref('password');

            const store = useStore()
            const router = useRouter();
            const errors = ref(false);
            const res = ref({
                email:[],
                password:[],
            });
            async function login(){
                await Promise.all([apiLogin({email:email.value, password:password.value})])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){
                            res.value = results[0].data;
                        }else{
                            store.dispatch('login',results[0].data);
                            router.push({name:'dashboard'});
                        }
                    });
            }


            return {
                email,
                password,
                res,
                login
            }
        }
    }
</script>
