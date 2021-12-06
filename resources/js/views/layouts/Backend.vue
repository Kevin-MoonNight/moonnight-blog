<template>
    <div class="flex relative w-full h-screen bg-blueGray-700">
        <navigation-menu :is-open="isOpen" :close-nav="closeNav"/>


        <div class="overflow-y-auto p-5 w-full h-full xl:w-4/5">
            <user-navigation :change-open="changeOpen"></user-navigation>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import NavigationMenu from "../backend/NavigationMenu";
import {ref} from "vue";
import UserNavigation from "../backend/UserNavigation";

export default {
    components: {
        UserNavigation,
        NavigationMenu
    },
    setup() {
        const isOpen = ref(false);

        const closeNav = () => {
            isOpen.value = false;
        }
        const changeOpen = () => {
            isOpen.value = !isOpen.value;
        }
        return {
            isOpen,
            changeOpen,
            closeNav
        }
    }
}
</script>
