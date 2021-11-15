<template>
    <table class="table-auto w-full h-full min-w-lg">
        <thead>
        <tr class="bg-gray-400">
            <th class="w-1/12 py-2">稱謂</th>
            <th class="w-2/12 py-2">電子信箱</th>
            <th class="w-2/12 py-2">委託類型</th>
            <th class="w-4/12 py-2">備註</th>
            <th class="w-2/12 py-2">時間</th>
            <th class="w-1/12 py-2">動作</th>
        </tr>
        </thead>

        <transition name="fade">
            <tbody v-show="isShow">
            <tr v-for="message in messages" class="h-14 border-b hover:bg-gray-200">
                <td class="h-14 text-center ">
                    {{message.name}}
                </td>

                <td class="h-14 text-center ">
                    {{message.email}}
                </td>
                <td class="h-14 text-center ">
                    {{message.caseType}}
                </td>
                <td class="h-14 text-center ">
                    {{message.remark}}
                </td>
                <td class="h-14  text-center">
                    {{date(message.created_at)}}
                </td>

                <td class="flex justify-center h-14">
                    <button v-clipboard:copy="message.email"
                            v-clipboard:success="onCopy"
                            v-clipboard:error="onError"
                            class="hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"  d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                    </button>

                    <button @click="deleteMessage(message.id)" class="hover:text-blue-500" title="刪除訊息">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>

                </td>
            </tr>
            </tbody>
        </transition>
    </table>
</template>

<script>
    import {ref, toRefs} from "vue";
    import moment from "moment";
    import {apiDeleteMessage} from "../../api/message";
    import {useStore} from "vuex";

    export default {
        props:['messages','isShow','refreshMessages'],
        setup(props){
            const { refreshMessages } = toRefs(props);
            const errors = ref('');
            const store = useStore();
            const deleteMessage =  async (messageId) => {
                await Promise.all([apiDeleteMessage(messageId)])
                    .then((results) => {
                        errors.value = results[0].data.errors;

                        if(errors.value){

                        }else{
                            store.dispatch('addNotice',{name:'提醒',message:'訊息刪除成功!'});
                            refreshMessages.value();
                        }
                    });
            }

            function onCopy(e) {
                alert('您已複製: ' + e.text)
            }
            function onError(e) {
                alert('複製失敗')
            }

            function date(create_at){
                return moment(create_at).format('YYYY-MM-DD');
            }

            return {
                errors,
                deleteMessage,
                date,
                onCopy,
                onError
            }
        }
    }
</script>
