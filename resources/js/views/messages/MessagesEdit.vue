<template>
    <transition name="fade">
        <div v-show="isShow" class="w-full h-auto bg-white rounded-sm shadow-md">
            <div class="p-5">
                <div class="w-full">
                    <base-label htmlFor="name">名稱</base-label>

                    <base-input-text
                        v-model:value="message.name"
                        name="name"
                        placeholder="名稱"
                    ></base-input-text>
                </div>

                <div class="mt-4 w-full">
                    <base-label htmlFor="email">電子信箱</base-label>

                    <base-input-text
                        v-model:value="message.email"
                        type="email"
                        name="email"
                        placeholder="電子信箱"
                    ></base-input-text>
                </div>

                <div class="mt-4 w-full">
                    <base-label htmlFor="remark">訊息</base-label>

                    <base-input-text
                        v-model:value="message.remark"
                        name="remark"
                        placeholder="訊息"
                    ></base-input-text>
                </div>

                <div class="mt-4 w-full">
                    <base-label htmlFor="caseType">委託類型</base-label>

                    <base-select
                        v-model:value="message.caseType"
                        name="caseType"
                    >
                        <option disabled value="">請選擇委託類型</option>
                        <option v-for="service in services" :value="service.title">{{ service.title }}</option>
                        <option value="其他">其他</option>
                    </base-select>
                </div>


                <div class="flex justify-end mt-4 w-full">
                    <base-button @click="updateMessage">
                        更新訊息
                    </base-button>
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
import BaseLabel from "../components/BaseLabel";
import BaseInputText from "../components/BaseInputText";
import BaseSelect from "../components/BaseSelect";
import BaseButton from "../components/BaseButton";
import Editor from "../components/Editor";

export default {
    components: {
        BaseSelect,
        BaseButton,
        BaseInputText,
        BaseLabel,
        Editor
    },
    data() {
        return {
            services: {
                algorithm: {
                    title: "演算法程式開發",
                },
                IndependentStudy: {
                    title: "專題程式開發",
                },
                thesis: {
                    title: "論文程式開發",
                },
                website: {
                    title: "客製化網站服務",
                },
                desktop: {
                    title: "桌面軟體開發",
                },
                corporation: {
                    title: "品牌形象網站設計",
                }
            }
        }
    },
    setup() {
        const route = useRoute()
        const id = route.params.id;
        const message = ref({
            name: '',
            email: '',
            remark: '',
            caseType: ''
        });
        const isShow = ref(false);
        onBeforeMount(async () => {
            await apiGetMessage(id)
                .then((res) => {
                    message.value = res.data;
                    isShow.value = true;
                });
        });

        const store = useStore()
        const router = useRouter();
        const updateMessage = async () => {
            await apiUpdateMessage(id, message.value)
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
