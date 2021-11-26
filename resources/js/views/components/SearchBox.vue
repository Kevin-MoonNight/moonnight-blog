<template>
    <form class="flex justify-center w-full h-12 bg-white rounded-lg border-2 hover:border-gray-800">
        <input v-model="text" title="搜尋文章" type="search" name="text" id="text" placeholder="搜尋文章"
               class="px-5 w-full h-full rounded-lg outline-none">

        <button @click.prevent="search"
                class="flex justify-center items-center w-12 text-gray-500 hover:text-black">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>
    </form>
</template>

<script>
import {onBeforeMount, ref, toRefs} from "vue";
import {useRoute, useRouter} from "vue-router";

export default {
    props: ['link'],
    setup(props) {
        const {link} = toRefs(props);
        const text = ref('');
        const router = useRouter();
        const route = useRoute();

        onBeforeMount(() => {
            //保留上一次的搜尋
            if (typeof route.query.search !== 'undefined') {
                text.value = route.query.search;
            }
        })

        const search = () => {
            text.value = text.value.trim();
            if (text.value.length !== 0) {
                const query = ref({});
                query.value = {search: text.value}

                if (typeof route.query.tag !== 'undefined') {
                    Object.assign(query.value, {tag: route.query.tag})
                }

                router.push({name: link.value, query: query.value});
            }
        }

        return {
            text,
            search
        }
    }
}
</script>
