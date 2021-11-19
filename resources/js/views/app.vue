<template>
    <metainfo>
        <template v-slot:title="{ content }">{{ content ? `${content} | MoonNight` : `演算法程式設計 | MoonNight` }}</template>
        <template v-slot:description="{ content }">{{ content ? `${content}` : `演算法程式外包 | MoonNight` }}</template>
    </metainfo>
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
    metaInfo() {
        return {
            title: '演算法程式設計',
            description: {
                content: 'MoonNight 慕耐工作室，題供演算法程式設計、專題程式設計、論文程式設計、桌面軟體設計、客製化網站服務、品牌形象網站設計等服務'
            }
        }
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
