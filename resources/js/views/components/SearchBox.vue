<template>
    <form class="flex justify-center w-full h-12 bg-white rounded-lg border-2 hover:border-gray-800">
        <input v-model.trim="text" type="search" name="text" id="text" placeholder="搜尋文章" title="搜尋文章"
               class="px-5 w-full h-full rounded-lg outline-none">

        <button @click.prevent="search" class="flex justify-center items-center w-12 text-gray-500 hover:text-black">
            <i class="fas fa-search"></i>
        </button>
    </form>
</template>

<script>
import {useRoute, useRouter} from "vue-router";
import {computed, reactive, ref, toRefs, onBeforeMount} from "vue";

export default {
    props: {
        link: {
            type: String,
            required: true
        }
    },
    setup(props) {
        const {link} = toRefs(props);
        const router = useRouter();
        const route = useRoute();

        const text = ref('');
        const query = reactive({
            search: computed(() => text.value),
            tag: computed(() => route.query.tag)
        });

        onBeforeMount(() => {
            //保留上一次的搜尋
            text.value = route.query.search ? route.query.search : '';
        })

        const search = () => {
            if (query.search.length !== 0) {
                router.push({name: link.value, query: query});
            }
        }

        return {
            text,
            query,
            search
        }
    }
}
</script>
