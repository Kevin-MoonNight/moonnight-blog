<template>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-1 gap-6 text-md text-black">
                <div class="col-span-3 sm:col-span-3">
                    <label for="name" class="block text-gray-700">稱謂</label>
                    <input v-model="message.name" type="text" name="name" id="name" placeholder="請輸入稱謂" required
                           class="input-style">

                    <div v-if="errors" class="text-red-600 mt-2 text-sm">
                        <p v-for="error in res.name">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3 sm:col-span-3">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input v-model="message.email" type="text" name="email" id="email" placeholder="請輸入電子信箱" autocomplete="email" required
                           class="input-style">

                    <div v-if="errors" class="text-red-600 mt-2 text-sm">
                        <p v-for="error in res.email">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3 sm:col-span-3">
                    <label for="remark" class="block text-gray-700">備註</label>
                    <input v-model="message.remark" type="text" name="remark" id="remark" placeholder="這裡可以留下你想要說的話"
                           class="input-style">

                    <div v-if="errors" class="text-red-600 mt-2 text-sm">
                        <p v-for="error in res.remark">{{error}}</p>
                    </div>

                </div>

                <div class="col-span-3 sm:col-span-3">
                    <label for="caseType" class="block text-gray-700">委託類型</label>
                    <select v-model="message.caseType" id="caseType" name="caseType"
                            class="mt-1 block w-full py-2 px-3 border-2 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option disabled value="">請選擇委託類型</option>
                        <option selected value="演算法">演算法</option>
                        <option value="桌面應用程式">桌面應用程式</option>
                        <option value="網頁">網頁</option>
                        <option value="其他">其他</option>
                    </select>

                    <div v-if="errors" class="text-red-600 mt-2 text-sm">
                        <p v-for="error in res.caseType">{{error}}</p>
                    </div>

                </div>

            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button @click="submit" class="inline-flex justify-center py-2 px-4 border-2 border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">傳送</button>
        </div>

    </div>
</template>


<script>
    import {ref} from "vue";
    import {apiCreateMessage} from "../../api/message";

    export default {
        setup(){
            const message = ref({
                name:'',
                email:'',
                remark:'',
                caseType:''
            });
            const res = ref({
                name:[],
                email:[],
                remark:[],
                caseType:[]
            });
            const errors = ref(false);

            const submit = async () => {
                await Promise.all([apiCreateMessage(message.value)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){
                            res.value = results[0].data.data;
                        }else{
                            clearData();
                        }
                    });
            }

            function clearData(){
                message.value = {
                    name:'',
                    email:'',
                    remark:'',
                    caseType:''
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
