<template>
    <nav class="sticky top-0 z-50 h-14 bg-white shadow-md flex justify-center">
        <div class="flex justify-between max-w-screen-xl w-full">
            <div class="flex text-md">
                <router-link to="/" class="py-4 px-4 text-xl">MoonNight</router-link>

                <div v-for="page in pages">
                    <router-link  :to="page.link" class="hidden md:flex py-4 px-2 group">
                        <span class="px-2 border-red-200 group-hover:border-b-4">{{ page.name }}</span>
                    </router-link>
                </div>


                <router-link to="/contact" class="py-4 px-2" >
                    <p class="animate-bounce">聯絡我們</p>
                </router-link>
            </div>

            <div class="hidden md:flex text-md">
<!--                <div v-if="auth">-->
<!--                    <a class="hidden md:flex py-4 px-2 group" href=/dashboard">-->
<!--                        <p class="px-2 border-red-200 group-hover:border-b-4">後台</p>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div v-else>-->
<!--                    <a class="hidden md:flex py-4 px-2 group" href="/login">-->
<!--                        <p class="px-2 border-red-200 group-hover:border-b-4">登入</p>-->
<!--                    </a>-->
<!--                </div>-->

            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data:function (){
            return {
                auth:0,
                pages:{
                    home:{
                        name:'首頁',
                        link:'/'
                    },
                    articles:{
                        name:'文章',
                        link:'/articles'
                    },
                    sideProject:{
                        name:'SideProject',
                        link:'/articles/tag/SideProject'
                    },
                    project:{
                        name:'專案作品',
                        link:'/product'
                    }
                },
            }
        },
        async beforeCreate() {
            // const instance = axios.create({
            //     baseURL: 'http://localhost/api',
            // });
            //
            // const url = '/authCheck';
            //
            // await instance.get(url)
            //     .then((response) => {
            //         this.auth = response.data;
            //     })
            //     .catch((response) => {
            //         console.log(response);
            //     });
        }
    }
</script>
