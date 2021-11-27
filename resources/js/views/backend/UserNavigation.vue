<template>
    <nav class="flex justify-between px-6 py-3 mb-10 h-16 text-gray-200 rounded-sm shadow-md bg-blueGray-600">
        <button @click="changeOpen" class="h-full xl:hidden">
            <i class="fas fa-bars"></i>
        </button>

        <div class="relative h-full">
            <div class="flex items-center h-full">
                <p class="">
                    {{ user.name }}
                </p>
                <button @click="profileDropdown = !profileDropdown" class="ml-3 h-full">
                    <img :src="user.profile_photo_url" alt="無法載入圖片" class="h-full rounded-full">
                </button>
            </div>

            <transition name="list">
                <div v-show="profileDropdown"
                     class="absolute py-2 mt-16 h-auto text-gray-900 bg-white rounded-md min-w-32">
                    <button @click="logout" class="px-5 py-3 w-full hover:bg-gray-200">Logout</button>
                </div>
            </transition>

        </div>
    </nav>
</template>

<script>
import {computed, ref, toRefs} from "vue";
import {logout} from "../../api/utils";
import {useStore} from "vuex";

export default {
    props: ['changeOpen'],
    setup(props) {
        const store = useStore();
        const {changeOpen} = toRefs(props);

        const user = computed(() => {
            return store.state.auth.user;
        });

        const profileDropdown = ref(false);

        return {
            user,
            profileDropdown,
            changeOpen,
            logout: logout
        }
    }
}
</script>
