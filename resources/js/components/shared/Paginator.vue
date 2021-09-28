<template>
    <div v-show="items.total > 0" class="flex justify-center items-center px-10 py-2">
        <div class="grid grid-cols-3 w-full">

            <p>{{items.from}} - {{items.to}} of {{items.total}}</p>

            <div class="flex justify-between">

                <button @click="prevPage" class="transform duration-200 p-2 bg-gray-200 rounded-full hover:bg-indigo-600 text-gray-400 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>

                <button @click="nextPage" class="transform duration-200 p-2 bg-gray-200 rounded-full hover:bg-indigo-600 text-gray-400 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>

            </div>

            <p class="flex justify-end">
                {{items.current_page}}
            </p>

        </div>
    </div>
</template>

<script>
    import {toRefs} from "vue";
    import {useRouter,useRoute} from "vue-router";

    export default {
        props:['items'],
        setup(props){
            const {items} = toRefs(props)
            const router = useRouter()
            const route = useRoute();

            const prevPage = () => {
                if(items.value.prev_page_url != null){
                    const page = items.value.prev_page_url.split('?page=')[1];
                    //將先前有的參數一並傳回去
                    const tag = route.query.tag;
                    const search = route.query.search;
                    router.push({name:'articles',query:{page:page,tag:tag,search:search}});
                }
            }
            const nextPage = () => {
                if(items.value.next_page_url != null){
                    const page = items.value.next_page_url.split('?page=')[1];
                    //將先前有的參數一並傳回去
                    const tag = route.query.tag;
                    const search = route.query.search;
                    router.push({name:'articles',query:{page:page,tag:tag,search:search}});
                }
            }

            return {
                prevPage,
                nextPage
            }
        }
    }
</script>
