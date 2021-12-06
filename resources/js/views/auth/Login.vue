<template>
    <div class="flex justify-center items-center min-h-screen bg-blueGray-800">
        <div class="px-4 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words rounded-lg border-0 shadow-lg bg-blueGray-200">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-sm font-bold text-blueGray-500">
                            登入
                        </h6>
                    </div>
                    <div class="text-center">
                        <button
                            class="inline-flex items-center px-4 py-2 mr-1 mb-1 text-xs font-normal font-bold uppercase bg-white rounded shadow transition-all duration-150 ease-linear outline-none active:bg-blueGray-50 text-blueGray-700 focus:outline-none hover:shadow-md">
                            <img alt="..." class="mr-1 w-5" :src="google"/>
                            Google
                        </button>
                    </div>
                    <hr class="mt-6 border-b-1 border-blueGray-300"/>
                </div>
                <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                    <div class="mb-3 font-bold text-center text-blueGray-400">
                        <small>或使用其他方法登入</small>
                    </div>
                    <div>
                        <div class="w-full">
                            <base-label html-for="email">電子信箱</base-label>
                            <base-input-text
                                v-model:value="account.email"
                                type="email"
                                name="email"
                                placeholder="電子信箱"
                            >
                            </base-input-text>
                        </div>

                        <div class="mt-3 w-full">
                            <base-label html-for="name">密碼</base-label>
                            <base-input-text
                                v-model:value="account.password"
                                type="password"
                                name="password"
                                placeholder="密碼"
                            >
                            </base-input-text>
                        </div>

                        <div class="mt-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input id="customCheckLogin" type="checkbox"
                                       class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox text-blueGray-700"/>
                                <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        記得我
                                    </span>
                            </label>
                        </div>

                        <div class="mt-6 text-center">
                            <base-button
                                @click="login(account)"
                            >
                                登入
                            </base-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-6">
                <div class="w-1/2">
                    <router-link to="" class="text-blueGray-200">
                        <small>忘記密碼?</small>
                    </router-link>
                </div>
                <div class="w-1/2 text-right">
                    <router-link to="" class="text-blueGray-200">
                        <small>建立新帳號</small>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";
import {login} from "../../api/utils";
import google from "../assets/images/google.svg";
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";
import BaseButton from "../components/BaseButton";

export default {
    components: {
        BaseButton,
        BaseInputText,
        BaseLabel
    },
    data() {
        return {
            google
        }
    },
    metaInfo() {
        return {
            title: '登入'
        }
    },
    setup() {
        const account = ref({
            email: '',
            password: ''
        });

        return {
            account,
            login: login
        }
    }
}
</script>
