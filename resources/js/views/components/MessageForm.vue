<template>
    <div class="w-full break-words rounded-lg shadow-lg bg-blueGray-200">
        <div class="flex-auto p-5 lg:p-10">
            <div class="mb-3 w-full">
                <label htmlFor="name" class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    全名
                </label>
                <input v-model="message.name" type="text" name="name" id="name" placeholder="全名"
                       class="input-style"/>
            </div>

            <div class="mb-3 w-full">
                <label htmlFor="email" class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    電子信箱
                </label>
                <input v-model="message.email" type="email" name="email" id="email" placeholder="電子信箱"
                       autocomplete="email" class="input-style">
            </div>

            <div class="mb-3 w-full">
                <label htmlFor="remark" class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    訊息
                </label>
                <textarea v-model="message.remark" name="remark" id="remark" placeholder="這裡可以留下你想要說的話"
                          rows="4" cols="80" class="input-style"/>
            </div>

            <div class="mb-3 w-full">
                <label htmlFor="caseType"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    訊息
                </label>
                <select v-model="message.caseType" id="caseType" name="caseType" class="input-style">
                    <option disabled value="">請選擇委託類型</option>
                    <option v-for="service in services" :value="service.title">{{ service.title }}</option>
                    <option value="其他">其他</option>
                </select>
            </div>

            <div class="mt-6 text-center">
                <button @click="submit"
                        class="px-6 py-3 mr-1 mb-1 font-bold text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                    傳送
                </button>
            </div>
        </div>
    </div>
</template>


<script>
import {ref} from "vue";
import {apiCreateMessage} from "../../api/message";
import {useStore} from "vuex";

export default {
    setup() {
        const message = ref({
            name: '',
            email: '',
            remark: '',
            caseType: ''
        });

        const services = {
            algorithm: {
                title: "演算法程式開發",
                img: "../../../images/algorithm.svg"
            },
            IndependentStudy: {
                title: "專題程式開發",
                img: "../../../images/IndependentStudy.svg"
            },
            thesis: {
                title: "論文程式開發",
                img: "../../../images/thesis.svg"
            },
            website: {
                title: "客製化網站服務",
                img: "../../../images/website.svg"
            },
            desktop: {
                title: "桌面軟體開發",
                img: "../../../images/desktop.svg"
            },
            corporation: {
                title: "品牌形象網站設計",
                img: "../../../images/corporation.svg"
            }
        };

        const store = useStore()
        const submit = async () => {
            await Promise.all([apiCreateMessage(message.value)])
                .then(() => {
                    clearData();
                    store.dispatch('addNotice', {message: '訊息傳送成功!', color: true});
                });
        }

        function clearData() {
            message.value = {
                name: '',
                email: '',
                remark: '',
                caseType: ''
            }
        }

        return {
            message,
            services,
            submit
        }
    }
}
</script>
