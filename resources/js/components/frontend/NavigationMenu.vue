<template>
    <header class="sticky top-0 z-50 h-14 w-full bg-white shadow-md">
        <nav class="flex justify-center">
            <div class="flex justify-between max-w-screen-xl w-full">
                <div class="flex">
                    <a v-bind:href="'/'" class="py-4 px-4 text-xl cursor-pointer">MoonNight</a>

                    <div v-for="page in pages">
                        <a v-bind:href="page.link" class="hidden md:flex py-4 px-2 group">
                            <span class="px-2 transform duration-75 border-indigo-500 group-hover:border-b-4">{{ page.name }}</span>
                        </a>
                    </div>

                    <router-link to="/contact" class="py-4 px-2" >
                        <p class="animate-bounce">聯絡我們</p>
                    </router-link>
                </div>

                <div class="hidden md:flex text-md">
                    <a v-if="!isAuth" class="hidden md:flex py-4 px-2 group" v-bind:href="'/login'">
                        <p class="px-2 transform duration-75 border-indigo-500 group-hover:border-b-4">登入</p>
                    </a>
                    <a v-if="isAuth" class="hidden md:flex py-4 px-2 group" v-bind:href="'/dashboard'">
                        <p class="px-2 transform duration-75 border-indigo-500 group-hover:border-b-4">後台</p>
                    </a>
                    <button v-if="isAuth" @click="logout" class="hidden md:flex py-4 px-2 group">
                        <p class="px-2 transform duration-75 border-indigo-500 group-hover:border-b-4">登出</p>
                    </button>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    import {onMounted} from "vue";
    import { useStore } from 'vuex'
    import { computed } from 'vue'
    import { useRouter } from "vue-router";
    import {apiLogout} from "../../api/auth";
    import Headroom from "headroom.js";

    export default {
        data (){
            return {
                pages:[
                    {
                        name:'首頁',
                        link:'/'
                    },
                    {
                        name:'文章',
                        link:'/articles'
                    },
                    {
                        name:'專案作品',
                        link:'/product'
                    }
                ],
            }
        },
        setup(){
            const store = useStore();
            const router = useRouter();

            async function logout(){
                await Promise.all([apiLogout()])
                    .then((results) => {
                        store.dispatch('logout');
                        router.push({name:'home'});
                    });
            }

            const isAuth = computed(()=>{
                return store.state.auth.isAuth;
            });

            onMounted(()=>{
                const myElement = document.querySelector("header");
                const headroom  = new Headroom(myElement);
                headroom.init();
            })
            return {
                isAuth,
                logout
            }
        }
    }
</script>
