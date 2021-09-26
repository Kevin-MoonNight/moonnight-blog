<template>
    <form class="flex justify-center lg:w-2/3 w-full h-12 border-2 hover:border-gray-800 rounded-lg bg-white">
        <input v-model="text" title="搜尋文章" type="search" name="text" id="text" placeholder="搜尋文章"
                      class="w-full h-full px-5 outline-none rounded-lg">

        <button @click.prevent ="search(text.trim())"
                class="flex justify-center items-center w-12 text-gray-500 hover:text-black">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>

    </form>
</template>

<script>
    import {ref, toRefs} from "vue";

    export default {
        props:['updateUrl'],
        setup(props){
            const {updateUrl} = toRefs(props)

            const text = ref('');
            function search(text){
                if(text.length !== 0){
                    updateUrl.value("/articles/search/" + text);
                }
            }

            return {
                text,
                search
            }
        }
    }
</script>
