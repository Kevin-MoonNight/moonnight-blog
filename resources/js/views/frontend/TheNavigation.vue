<template>
    <header class="sticky top-0 z-50 bg-white shadow-lg">
        <nav class="container flex justify-between items-center w-full h-14 rounded-md md:justify-start md:px-14">
            <router-link :to="{name:'home'}">
                <p class="px-4 text-xl">MoonNight</p>
            </router-link>

            <ul class="hidden md:flex md:items-center">
                <li v-for="link in links">
                    <router-link :to="link.link">
                        <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                            {{ link.title }}
                        </p>
                    </router-link>
                </li>
            </ul>

            <div @click="isOpen = !isOpen" class="px-4 cursor-pointer md:hidden">
                <div v-if="isOpen">
                    <i class="fas fa-times"></i>
                </div>
                <div v-else>
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <transition name="list" class="md:hidden">
                <div v-show="isOpen" @click="isOpen=false"
                     class="fixed top-14 w-full h-screen bg-opacity-30 bg-blueGray-700">
                    <ul class="w-full text-center bg-white bg-opacity-80">
                        <li v-for="link in links">
                            <router-link :to="link.link">
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
import Headroom from "headroom.js";

export default {
    setup() {
        const isOpen = ref(false);
        const links = ref([
            {
                title: '首頁',
                link: {
                    name: 'home'
                }
            },
            {
                title: '文章',
                link: {
                    name: 'articles'
                }
            },
            {
                title: '專案作品',
                link: {
                    name: 'products',
                }
            },
            {
                title: '聯絡我們',
                link: {
                    name: 'home',
                    hash: '#contact'
                }
            }
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
            isOpen,
            links
        }
    }
}
</script>
