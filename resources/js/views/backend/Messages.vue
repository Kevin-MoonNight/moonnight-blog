<template>
    <search-box :link="'messagesManage'"></search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <message-list
                v-if="isShow"
                :messages="messages"
                :refresh-messages="getMessages"
                :is-show="isShow">
            </message-list>
            <p v-if="messages.length === 0 && isShow" class="mt-10 w-full text-xl text-center text-red-500">
                找不到訊息!
            </p>
        </div>
    </div>

    <div v-if="isShow" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="response" :url="'messagesManage'"></paginator>
    </div>
</template>

<script>
import paginator from "../components/Paginator";
import MessageList from "../messages/MessagesList";
import LoadingIcon from "../components/LoadingIcon";
import SearchBox from "../components/SearchBox";
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetMessages} from "../../api/message";
import {useRoute} from "vue-router";

export default {
    components: {
        SearchBox,
        LoadingIcon,
        paginator,
        MessageList
    },
    setup() {
        const route = useRoute();
        const messages = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getMessages = async () => {
            isShow.value = false;
            await Promise.all([apiGetMessages(params.value)])
                .then((results) => {
                    messages.value = results[0].data.data
                    response.value = results[0].data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getMessages);
        watch(params, getMessages);

        return {
            messages,
            response,
            isShow,
            getMessages
        }
    }
}
</script>
