<template>
    <div v-show="items.total > 0" class="px-10 py-2">
        <div class="grid grid-cols-3 w-full h-full">

            <p class="flex justify-start items-center">
                {{ items.from }} - {{ items.to }} of {{ items.total }}
            </p>

            <div class="flex justify-between">
                <button @click="prevPage"
                        class="px-4 py-1 text-gray-400 bg-gray-200 rounded-sm duration-200 transform hover:bg-indigo-600 hover:text-gray-900">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button @click="nextPage"
                        class="px-4 py-1 text-gray-400 bg-gray-200 rounded-sm duration-200 transform hover:bg-indigo-600 hover:text-gray-900">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <p class="flex justify-end items-center">
                {{ items.current_page }}
            </p>
        </div>
    </div>
</template>

<script>
import {toRefs} from "vue";
import {useRouter, useRoute} from "vue-router";

export default {
    props: ['items', 'url'],
    setup(props) {
        const {items, url} = toRefs(props);
        const router = useRouter();
        const route = useRoute();

        const prevPage = () => {
            if (items.value.prev_page_url !== null) {
                const page = items.value.current_page - 1;
                router.push({name: url.value, query: Object.assign({}, route.query, {page: page})});
            }
        }
        const nextPage = () => {
            if (items.value.next_page_url !== null) {
                const page = items.value.current_page + 1;
                router.push({name: url.value, query: Object.assign({}, route.query, {page: page})});
            }
        }

        return {
            prevPage,
            nextPage
        }
    }
}
</script>
