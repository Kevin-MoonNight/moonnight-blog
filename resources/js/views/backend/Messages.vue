<template>
    <manage-layout
        :data="response"
        :link="link"
        :is-show="isShow"
        :search="true"
        :paginate="true"
    >
        <message-list
            :messages="messages"
            :refresh-messages="getMessages"
        >
        </message-list>

        <p v-if="messages.length === 0" class="mt-10 w-full text-xl text-center text-red-500">
            找不到訊息!
        </p>
    </manage-layout>
</template>

<script>
import {computed, onBeforeMount, ref, watch} from "vue";
import {apiGetMessages} from "../../api/message";
import {useRoute} from "vue-router";
import MessageList from "../messages/MessagesList";
import ManageLayout from "../layouts/ManageLayout";

export default {
    components: {
        ManageLayout,
        MessageList
    },
    setup() {
        const route = useRoute();
        const link = ref('messagesManage');
        const messages = ref([]);
        const response = ref({});
        const isShow = ref(false);

        const params = computed(() => route.query);
        const getMessages = async () => {
            isShow.value = false;
            await apiGetMessages(params.value)
                .then((res) => {
                    messages.value = res.data.data
                    response.value = res.data;
                    isShow.value = true;
                });
        }

        onBeforeMount(getMessages);
        watch(params, getMessages);

        return {
            link,
            messages,
            response,
            isShow,
            getMessages
        }
    }
}
</script>
