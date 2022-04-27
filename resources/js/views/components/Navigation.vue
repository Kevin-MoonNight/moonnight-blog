<template>
    <header
        class="fixed top-0 z-30 w-full bg-white transition-all"
        :class="(scrollActive ? 'shadow-md pt-0' : 'bg-gray-100 pt-4')"
    >
        <nav class="grid grid-flow-col px-6 py-4 mx-auto max-w-screen-xl sm:px-8 lg:px-16">
            <div class="flex col-start-1 col-end-2 items-center">
                <logo></logo>
            </div>
            <ul class="hidden col-start-3 col-end-8 items-center text-black lg:flex">
                <slot name="main"></slot>
            </ul>
            <div class="flex col-start-10 col-end-12 justify-end items-center font-medium">
                <slot name="side"></slot>
                <div @click="openNav = !openNav" class="ml-4 cursor-pointer lg:hidden">
                    <i v-if="openNav" class="fas fa-times"></i>
                    <i v-else class="fas fa-bars"></i>
                </div>
            </div>
        </nav>
    </header>

    <nav v-if="openNav" class="fixed right-0 left-0 top-20 z-20 px-4 lg:hidden sm:px-8">
        <div class="bg-white shadow-md sm:px-3">
            <ul class="w-full text-black">
                <slot name="mobile"></slot>
            </ul>
        </div>
    </nav>
</template>

<script>
import {ref} from "vue";
import Logo from "./Logo";

export default {
    components: {Logo},
    setup() {
        const scrollActive = ref(window.scrollY > 20);

        window.addEventListener("scroll", () => {
            scrollActive.value = window.scrollY > 20;
        });

        const openNav = ref(false);

        return {
            scrollActive,
            openNav
        }
    }
}
</script>
