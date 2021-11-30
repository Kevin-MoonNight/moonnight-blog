<template>
    <metainfo>
        <template v-slot:title="{ content }">{{ content ? `${content} | MoonNight` : title }}</template>
        <template v-slot:description="{ content }">{{ content ? `${content}` : description.content }}</template>
    </metainfo>
    <router-view></router-view>
    <transition name="fade" class="fixed bottom-20">
        <div v-show="notices.length > 0" class="flex flex-col gap-5 items-end px-5 w-full">
            <notice v-for="notice in notices" :message="notice.message" :color="notice.color"/>
        </div>
    </transition>
</template>

<script>
import Notice from "./components/Notice";
import {computed} from "vue";
import {useStore} from "vuex";
import {useMeta} from 'vue-meta'

export default {
    components: {
        Notice
    },
    data() {
        return {
            title: '演算法程式設計，慕耐程式工作室 | MoonNight',
            description: 'MoonNight慕耐工作室，我們是一群熱愛程式的學生，擁有強大的程式基礎，在堅實的基礎上替您打造所需的程式，提供演算法程式設計、專題程式設計、論文程式設計、桌面軟體設計、客製化網站服務、品牌形象網站設計等服務。'
        }
    },
    setup() {
        const store = useStore()
        const notices = computed(() => store.state.notice.notices);

        useMeta({
            title: '演算法程式設計，慕耐程式工作室',
            description: 'MoonNight慕耐工作室，我們是一群熱愛程式的學生，擁有強大的程式基礎，在堅實的基礎上替您打造所需的程式，提供演算法程式設計、專題程式設計、論文程式設計、桌面軟體設計、客製化網站服務、品牌形象網站設計等服務。'
        });

        return {
            notices
        }
    }
}
</script>
