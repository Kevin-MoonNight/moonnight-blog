<template>
    <div class="w-full h-auto pb-10">
        <div class="w-full h-auto bg-white rounded-md">
            <div class="overflow-x-auto">
                <message-list v-bind:is-show="isShow" v-bind:messages="messages" v-bind:refresh-messages="getMessages"></message-list>
            </div>
            <paginator v-bind:items="response" v-bind:update-url="updateUrl" />
        </div>
    </div>
</template>

<script>
    import paginator from "../components/Paginator";
    import MessageList from "./MessageList";
    import {ref, watchEffect} from "vue";
    import {apiMessages} from "../../api/message";


    export default {
        components: {
            paginator,
            MessageList
        },
        setup(){
            const messages = ref([]);
            const response = ref({});
            const isShow = ref(false);

            const url = ref('/messages');
            function updateUrl(newUrl){
                if(newUrl !== null && newUrl !== url.value){
                    url.value = newUrl;
                }
            };

            const getMessages = async () => {
                isShow.value = false;
                await Promise.all([apiMessages(url.value)])
                    .then((results) => {
                        messages.value = results[0].data.data
                        response.value = results[0].data;
                        isShow.value=true;
                    });
            }
            watchEffect(getMessages);

            return {
                messages,
                response,
                isShow,
                updateUrl,
                getMessages
            }
        }
    }
</script>
