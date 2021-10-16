<template>
    <header class="flex sticky top-0 z-50 justify-center bg-white bg-opacity-90 shadow-md">
        <nav class="flex justify-between items-center w-full max-w-screen-xl h-14 md:justify-start">
            <router-link :to="{name:'home'}">
                <p class="px-4 text-xl">MoonNight</p>
            </router-link>

            <ul class="hidden md:flex md:items-center">
                <li v-for="page in pages">
                    <router-link v-if="page.isShow" :key="page" :to="{name:page.name}">
                        <p class="flex items-center px-4 h-14 hover:text-indigo-500">
                            {{ page.title }}
                        </p>
                    </router-link>
                </li>
            </ul>

            <div @click="isOpen = !isOpen" class="px-4 cursor-pointer md:hidden">
                <div v-if="isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <div v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>

            <transition name="list" class="md:hidden">
                <div v-show="isOpen" @click="isOpen=false"
                     class="fixed top-14 w-full h-screen bg-gray-700 bg-opacity-30">
                    <ul class="w-full text-center bg-white bg-opacity-80">
                        <li v-for="page in pages">
                            <router-link v-if="page.isShow" :key="page.title" :to="{name:page.name}">
                                <p class="py-4 w-full hover:text-indigo-500">
                                    {{ page.title }}
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </transition>
        </nav>
    </header>
</template>

<script>
    import {onMounted, ref} from "vue";
    import { useStore } from 'vuex'
    import { computed } from 'vue'
    import Headroom from "headroom.js";

    export default {
        setup(){
            const store = useStore();
            const isAuth = computed(()=>{
                return store.state.auth.isAuth;
            });

            const isOpen = ref(false);
            const pages = ref([
                {
                    title:'首頁',
                    name:'home',
                    isShow:true
                },
                {
                    title:'文章',
                    name:'articles',
                    isShow:true
                },
                {
                    title:'專案作品',
                    name:'product',
                    isShow:true
                },
                {
                    title:'聯絡我們',
                    name:'contact',
                    isShow:true
                },
                {
                    title:'後台',
                    name:'dashboard',
                    isShow: computed(()=>{
                        return isAuth.value;
                    })
                },
                {
                    title:'登入',
                    name:'login',
                    isShow:computed(()=>{
                        return !isAuth.value;
                    })
                },
                {
                    title:'登出',
                    name:'logout',
                    isShow:computed(()=>{
                        return isAuth.value;
                    })
                },
            ]);

            onMounted(()=>{
                const myElement = document.querySelector("header");
                const headroom  = new Headroom(myElement,{
                    onUnpin : function() {
                        isOpen.value = false
                    }
                });
                headroom.init();
            });

            return {
                isAuth,
                isOpen,
                pages
            }
        }
    }
</script>
