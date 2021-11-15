<template>
    <router-view></router-view>
    <transition name="fade" class="fixed bottom-20">
        <div v-show="notices.length > 0" class="flex flex-col gap-5 items-end px-5 w-full">
            <notice v-for="notice in notices" :message="notice.message" :color="notice.color"/>
        </div>
    </transition>
</template>

<script>
import {computed} from "vue";
import {useStore} from "vuex";
import Notice from "./components/Notice";

export default {
    components: {
        Notice
    },
    setup() {
        const store = useStore()
        const notices = computed(() => store.state.notice.notices);
        return {
            notices
        }
    }
}
</script>
