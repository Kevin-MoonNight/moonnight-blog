<template>
    <div class="relative flex h-screen w-full bg-gray-900">

        <transition name="fade" class="absolute top-20 w-full h-auto space-y-5 p-10">
            <div v-if="notices.length" class="w-40 py-2">
                <notice v-for="notice in notices" v-bind:item="notice" />
            </div>
        </transition>

        <div v-bind:class="{absolute:navState}"
             class="h-full w-auto select-none">

            <transition name="slide" class="h-full overflow-y-auto">
                <navigation-menu v-show="openNav || !navState" v-bind:openNav="openNav" v-bind:closeNav="closeNav"/>
            </transition>
        </div>

        <div class="w-full h-full p-5 overflow-y-auto">
            <nav class="flex justify-between h-16 p-3 mb-10 bg-blueGray-600 rounded-2xl text-gray-200 shadow-lg">
                <div class="flex justify-start items-center space-x-5  h-full w-full">
                    <button @click="openNav = !openNav" class="h-full xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-end h-full w-full relative">
                    <div class="flex items-center h-full space-x-3">
                        <p class="text-md">
                            {{userName}}
                        </p>
                        <button @click="profileDropdown = !profileDropdown" class="h-full">
                            <img v-bind:src="photoUrl" alt="無法載入圖片..."  class="h-full rounded-full">
                        </button>
                    </div>

                    <transition name="list" class="mt-16">
                        <div v-show="profileDropdown" class="absolute bg-white h-auto w-32 py-2 text-gray-900 rounded-md">
                            <div class="px-5 py-3 hover:bg-gray-200">Profile</div>

                            <button @click="logout" class="w-full px-5 py-3 hover:bg-gray-200">Logout</button>

                        </div>
                    </transition>

                </div>
            </nav>

            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import NavigationMenu from "../backend/NavigationMenu";
    import { useStore } from "vuex";
    import { computed , ref , watchEffect } from "vue";
    import { useRouter } from "vue-router";
    import { apiLogout } from "../../api/auth";
    import Notice from '../shared/Notice';

    export default {
        components: {
            NavigationMenu,
            Notice
        },
        setup(){
            const store = useStore()

            const photoUrl = computed(()=>{
                return store.state.auth.user.profile_photo_url;
            });

            const userName = computed(()=>{
                return store.state.auth.user.name;
            });


            const openNav = ref(false);
            function closeNav(){
                openNav.value = false;
            }

            const navState = ref(false);
            const windowWidth = ref(window.innerWidth);

            window.onresize = () => {
                windowWidth.value = window.innerWidth;
            }

            watchEffect(()=>{
                if(windowWidth.value < 1280){
                    navState.value = true;
                }else{
                    navState.value = false;
                    openNav.value = false;
                }
            })

            const profileDropdown = ref(false);

            const router = useRouter();
            async function logout(){
                await Promise.all([apiLogout()])
                    .then((results) => {
                        store.dispatch('logout');
                        router.push({name:'home'});
                    });
            }


            const notices = computed(()=>{
                return store.state.notice.notice;
            })

            return {
                userName,
                photoUrl,
                openNav,
                closeNav,
                navState,
                profileDropdown,
                logout,
                notices,
            }
        }
    }
</script>
