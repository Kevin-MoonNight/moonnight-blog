<template>
    <nav class="flex justify-between px-6 py-3 mb-10 h-16 text-gray-200 rounded-sm shadow-md bg-blueGray-600">
        <button @click="changeOpen" class="h-full xl:hidden">
            <i class="fas fa-bars"></i>
        </button>

        <div class="relative h-full">
            <div class="flex items-center h-full">
                <p class="">
                    {{ userName }}
                </p>
                <button @click="profileDropdown = !profileDropdown" class="ml-3 h-full">
                    <img v-bind:src="photoUrl" alt="無法載入圖片..." class="h-full rounded-full">
                </button>
            </div>

            <transition name="list">
                <div v-show="profileDropdown"
                     class="absolute py-2 mt-16 min-w-32 h-auto text-gray-900 bg-white rounded-md">
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
        const photoUrl = computed(() => {
            return store.state.auth.user.profile_photo_url;
        });

        const userName = computed(() => {
            return store.state.auth.user.name;
        });

        const profileDropdown = ref(false);

        return {
            userName,
            photoUrl,
            profileDropdown,
            changeOpen,
            logout: logout
        }
    }
}
</script>
