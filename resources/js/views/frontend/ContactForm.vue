<template>
    <div class="overflow-hidden shadow md:rounded-md">
        <div class="px-4 py-5 bg-white md:p-6">
            <div class="grid grid-cols-1 gap-6 text-black text-md">
                <div class="col-span-3">
                    <label for="name" class="text-gray-700">稱謂</label>
                    <input v-model="message.name" type="text" name="name" id="name" placeholder="請輸入稱謂" required
                           class="input-style">

                    <div v-if="errors" class="mt-2 text-sm text-red-600">
                        <p v-for="error in res.name">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input v-model="message.email" type="text" name="email" id="email" placeholder="請輸入電子信箱"
                           autocomplete="email" required
                           class="input-style">

                    <div v-if="errors" class="mt-2 text-sm text-red-600">
                        <p v-for="error in res.email">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3">
                    <label for="remark" class="block text-gray-700">備註</label>
                    <input v-model="message.remark" type="text" name="remark" id="remark" placeholder="這裡可以留下你想要說的話"
                           class="input-style">

                    <div v-if="errors" class="mt-2 text-sm text-red-600">
                        <p v-for="error in res.remark">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3">
                    <label for="caseType" class="block text-gray-700">委託類型</label>
                    <select v-model="message.caseType" id="caseType" name="caseType"
                            class="input-style">
                        <option disabled value="">請選擇委託類型</option>
                        <option selected value="演算法">演算法</option>
                        <option value="桌面應用程式">桌面應用程式</option>
                        <option value="網頁">網頁</option>
                        <option value="其他">其他</option>
                    </select>

                    <div v-if="errors" class="mt-2 text-sm text-red-600">
                        <p v-for="error in res.caseType">{{error}}</p>
                    </div>

                </div>

            </div>
        </div>

        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
            <button @click="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md border-2 border-transparent shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                傳送
            </button>
        </div>

    </div>
</template>


<script>
import {ref} from "vue";
import {apiCreateMessage} from "../../api/message";

export default {
    setup() {
        const message = ref({
            name: '',
            email: '',
            remark: '',
            caseType: ''
        });
        const res = ref({
            name: [],
            email: [],
            remark: [],
            caseType: []
        });
        const errors = ref(false);

        const submit = async () => {
            await Promise.all([apiCreateMessage(message.value)])
                .then((results) => {
                    errors.value = results[0].data.errors;

                    if (errors.value) {
                        res.value = results[0].data.data;
                    } else {
                        clearData();
                    }
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
            res,
            errors,
            submit
        }
    }
}
</script>
