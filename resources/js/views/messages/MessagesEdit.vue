<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <label htmlFor="name"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        名稱
                    </label>
                    <input v-model="message.name" id="name" type="text" name="name" placeholder="名稱"
                           class="input-style">
                </div>

                <div class="mt-4 w-full">
                    <label htmlFor="email"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        電子信箱
                    </label>
                    <input v-model="message.email" id="email" type="email" name="title" placeholder="電子信箱"
                           class="input-style">
                </div>

                <div class="mt-4 w-full">
                    <label htmlFor="remark"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        訊息
                    </label>
                    <input v-model="message.remark" id="remark" type="text" name="title" placeholder="訊息"
                           class="input-style">
                </div>

                <div class="mb-3 w-full">
                    <label htmlFor="caseType"
                           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                        委託類型
                    </label>
                    <select v-model="message.caseType" id="caseType" name="caseType" class="input-style">
                        <option disabled value="">請選擇委託類型</option>
                        <option v-for="service in services" :value="service.title">{{ service.title }}</option>
                        <option value="其他">其他</option>
                    </select>
                </div>


                <div class="flex justify-end mt-4 w-full">
                    <button @click="updateMessage"
                            class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                        更新訊息
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import {onBeforeMount, ref} from "vue";
import {useStore} from "vuex";
import {apiGetMessage, apiUpdateMessage} from "../../api/message";
import {useRoute, useRouter} from "vue-router";

export default {
    data() {
        return {
            services: {
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
            }
        }
    },
    setup() {
        const route = useRoute()
        const messageId = route.params.id;
        const message = ref({
            name: '',
            email: '',
            remark: '',
            caseType: ''
        });
        const isShow = ref(false);
        const getData = async () => {
            await Promise.all([apiGetMessage(messageId)])
                .then((results) => {
                    message.value = results[0].data;
                    isShow.value = true;
                });
        }
        onBeforeMount(getData);

        const store = useStore()
        const router = useRouter();
        const updateMessage = async () => {
            await Promise.all([apiUpdateMessage(messageId, message.value)])
                .then(() => {
                    store.dispatch('addNotice', {message: '訊息更新成功!', color: true});
                    router.push({name: 'messagesManage'});
                });
        }

        return {
            message,
            isShow,
            updateMessage
        }
    }
}
</script>
