<template>
    <header class="sticky top-0 z-50 bg-white shadow-lg">
        <nav class="container flex justify-between items-center w-full h-14 rounded-md md:justify-start md:px-14">
            <router-link :to="{name:'home'}">
                <p class="px-4 text-xl">MoonNight</p>
            </router-link>

            <ul class="hidden md:flex md:items-center">
                <li v-for="link in links">
                    <router-link v-if="link.isShow" :to="link.data">
                        <p class="px-3 py-2 ml-3 text-center hover:text-indigo-500">
                            {{ link.title }}
                        </p>
                    </router-link>
                </li>
            </ul>

            <div @click="isOpen = !isOpen" class="px-4 cursor-pointer md:hidden">
                <div v-if="isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <div v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </div>
            </div>

            <transition name="list" class="md:hidden">
                <div v-show="isOpen" @click="isOpen=false"
                     class="fixed top-14 w-full h-screen bg-opacity-30 bg-blueGray-700">
                    <ul class="w-full text-center bg-white bg-opacity-80">
                        <li v-for="link in links">
                            <router-link v-if="link.isShow" :to="link.data">
                                <p class="py-4 w-full hover:text-indigo-500">
                                    {{ link.title }}
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
import {useStore} from 'vuex'
import {computed} from 'vue'
import Headroom from "headroom.js";

export default {
    setup() {
        const store = useStore();
        const isAuth = computed(() => {
            return store.state.auth.isAuth;
        });

        const isOpen = ref(false);
        const links = ref([
            {
                title: '首頁',
                data: {
                    name: 'home'
                },
                isShow: true
            },
            {
                title: '文章',
                data: {
                    name: 'articles'
                },
                isShow: true
            },
            {
                title: '專案作品',
                data: {
                    name: 'products',
                },
                isShow: true
            },
            {
                title: '聯絡我們',
                data: {
                    name: 'home',
                    hash: '#contact'
                },
                isShow: true
            },
            {
                title: '後台',
                data: {
                    name: 'dashboard'
                },
                isShow: computed(() => {
                    return isAuth.value;
                })
            },
            {
                title: '登入',
                data: {
                    name: 'login'
                },
                isShow: computed(() => {
                    return !isAuth.value;
                })
            },
            {
                title: '登出',
                data: {
                    name: 'logout'
                },
                isShow: computed(() => {
                    return isAuth.value;
                })
            },
        ]);

        onMounted(() => {
            const myElement = document.querySelector("header");
            const headroom = new Headroom(myElement, {
                onUnpin: function () {
                    isOpen.value = false
                }
            });
            headroom.init();
        });

        return {
            isAuth,
            isOpen,
            links
        }
    }
}
</script>
