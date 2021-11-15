<template>
    <div class="w-full h-full pb-10 overflow-x-auto">
        <div class="grid grid-cols-6 grid-rows-3 gap-5 w-full h-full min-w-lg">

            <div class="p-3 col-span-2 bg-gray-400 rounded-md shadow-lg">

            </div>

            <div class="p-3 col-span-4 bg-gray-400 rounded-md shadow-lg">

            </div>

            <div class="p-3 col-span-1 bg-gray-400 rounded-md shadow-lg">

            </div>

            <div class="p-3 col-span-1 bg-gray-400 rounded-md shadow-lg">


            </div>

            <div class="p-3 col-span-4 row-span-2 bg-gray-400 rounded-md shadow-lg">

            </div>

            <div class="p-3 col-span-2 bg-gray-400 rounded-md shadow-lg">

            </div>
        </div>
    </div>
</template>

<script>
    import {useStore} from "vuex";
    import {computed} from "vue";

    export default {
        setup(){
            const store = useStore()

            const photoUrl = computed(()=>{
                return store.state.user.profile_photo_url;
            });

            const userName = computed(()=>{
                return store.state.user.name;
            });

            return {
                userName,
                photoUrl
            }
        }
    }
</script>
