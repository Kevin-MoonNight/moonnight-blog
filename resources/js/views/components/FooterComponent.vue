<template>
    <footer class="select-none pt-8 pb-4 bg-blueGray-800">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap text-center lg:text-left">
                <div class="px-4 w-full lg:w-6/12">
                    <h4 class="text-3xl text-white">慕耐工作室</h4>
                    <h5 class="mt-4 mb-2 text-lg text-blueGray-400">
                        歡迎到來我們的社群軟體看看，裡面也有很多的酷東西!
                    </h5>
                    <div class="mt-6 mb-6 lg:mb-0">
                        <a :href="twitter">
                            <button title="twitter"
                                    class="justify-center items-center mr-2 w-10 h-10 font-normal text-blue-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </a>
                        <a :href="facebook">
                            <button title="facebook"
                                    class="justify-center items-center mr-2 w-10 h-10 font-normal text-blue-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                                <i class="fab fa-facebook-square"></i>
                            </button>
                        </a>
                        <a :href="line">
                            <button title="line"
                                    class="justify-center items-center mr-2 w-10 h-10 font-normal text-green-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                                <i class="fab fa-line"></i>
                            </button>
                        </a>
                        <a :href="github">
                            <button title="github"
                                    class="justify-center items-center mr-2 w-10 h-10 font-normal bg-white rounded-full shadow-lg outline-none text-blueGray-800 align-center focus:outline-none">
                                <i class="fab fa-github"/>
                            </button>
                        </a>
                        <a :href="youtube">
                            <button title="youtube"
                                    class="justify-center items-center mr-2 w-10 h-10 font-normal text-red-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                                <i class="fab fa-youtube"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="px-4 w-full lg:w-6/12">
                    <div class="flex flex-wrap mb-6 items-top">
                        <address class="px-4 ml-auto w-full lg:w-4/12">
                            <span class="block mb-2 font-bold uppercase text-blueGray-300 text-md">聯絡資訊</span>
                            <ul class="list-unstyled">
                                <li id="email" v-clipboard:copy="email" v-clipboard:success="onCopy" :title="email">
                                    <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                        電子信箱：{{ email }}
                                    </p>
                                </li>
                                <li v-clipboard:copy="phone" v-clipboard:success="onCopy" :title="phone">
                                    <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                        電話：{{ phone }}
                                    </p>
                                </li>
                                <li v-clipboard:copy="location" v-clipboard:success="onCopy" :title="location">
                                    <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                        地址：{{ location }}
                                    </p>
                                </li>
                            </ul>
                        </address>

                        <div class="px-4 ml-auto w-full lg:w-4/12">
                            <span class="block mb-2 font-bold uppercase text-blueGray-300 text-md">所有連結</span>
                            <ul class="font-semibold list-unstyled">
                                <li v-for="link in links">
                                    <router-link :to="link.data" :title="link.title"
                                                 class="block pb-2 text-sm text-blueGray-400 hover:text-indigo-500">
                                        {{ link.title }}
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3 border-blueGray-400"/>
            <div class="flex flex-wrap justify-center items-center md:justify-between">
                <div class="px-4 mx-auto w-full text-center md:w-4/12">
                    <div class="py-1 text-sm font-bold text-blueGray-500">
                        <a href="https://www.freepik.com">Designed by vectorjuice / Freepik</a>
                        <p>Copyright &copy; {{ year }} by {{ name }} All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
import {onCopy} from "../../api/utils";

export default {
    data() {
        return {
            name: '鄭政文',
            year: new Date().getFullYear(),
            github: '',
            facebook: '',
            twitter: '',
            line: '',
            youtube: '',
            email: '123456@example.com',
            phone: '0912345678',
            location: '新北市',
            links: [
                {
                    title: '關於我們',
                    data: {
                        name: 'home',
                        hash: '#about'
                    }
                },
                {
                    title: '文章列表',
                    data: {
                        name: 'articles'
                    }
                },
                {
                    title: '專案作品',
                    data: {
                        name: 'products'
                    }
                },
                {
                    title: '聯絡我們',
                    data: {
                        name: 'home',
                        hash: '#contact'
                    }
                }
            ]
        }
    },
    setup() {
        return {
            onCopy: onCopy
        }
    }
}
</script>
