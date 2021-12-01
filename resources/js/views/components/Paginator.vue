<template>
    <div class="px-10 py-2">
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
                {{ currentPage }}
            </p>
        </div>
    </div>
</template>

<script>
import {computed, toRefs} from "vue";
import {useRouter, useRoute} from "vue-router";

export default {
    props: {
        items: {
            type: Object,
            required: true
        },
        link: {
            type: String,
            required: true
        }
    },
    setup(props) {
        const {items, link} = toRefs(props);
        const currentPage = computed(() => items.value.current_page);
        const router = useRouter();
        const route = useRoute();

        const prevPage = () => {
            if (items.value.prev_page_url) {
                const page = currentPage.value - 1;
                const query = Object.assign({}, route.query, {page: page});

                router.push({name: link.value, query: query});
            }
        }
        const nextPage = () => {
            if (items.value.next_page_url) {
                const page = currentPage.value + 1;
                const query = Object.assign({}, route.query, {page: page});

                router.push({name: link.value, query: query});
            }
        }

        return {
            currentPage,
            prevPage,
            nextPage
        }
    }
}
</script>
