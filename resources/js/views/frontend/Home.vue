<template>
    <main class="select-none bg-blueGray-200">
        <section class="py-10 bg-blueGray-800">
            <div class="flex items-stretch md:min-h-screen">
                <div class="container px-4 mx-auto md:px-14">
                    <div class="grid grid-cols-1 gap-10 place-items-center w-full h-full lg:grid-cols-5">
                        <div class="lg:col-span-2">
                            <div class="text">
                                <h1 class="text-5xl text-white">
                                    慕耐工作室
                                </h1>
                                <p class="mt-4 text-lg text-blueGray-200">
                                    演算法、專題程式、論文程式開發，桌面軟體開發
                                </p>
                                <p class="mt-4 text-lg text-blueGray-200">
                                    品牌形象網站、客製化網站服務
                                </p>
                                <div class="flex flex-wrap gap-5 mt-20 serviceBnt">
                                    <router-link :to="{name:'home',hash:'#service'}"
                                                 class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        所有服務
                                    </router-link>
                                    <router-link :to="{name:'home',hash:'#contact'}"
                                                 class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        聯絡我們
                                    </router-link>
                                    <router-link :to="{name:'articles'}"
                                                 class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        所有文章
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <div class="hidden w-full h-full md:block lg:col-span-3 show">
                            <img alt="封面" class="object-contain w-full h-full"
                                 :src="cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="py-20 bg-blueGray-200">
            <div class="flex items-center md:min-h-screen">
                <div class="container px-4 mx-auto md:px-14">
                    <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                        <div class="text">
                            <h3 class="mb-2 text-3xl font-medium leading-normal">
                                慕耐是由一群學生所組成的工作室
                            </h3>
                            <p class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                我們是一群熱愛程式的學生，擁有強大的物件導向、資料結構、演算法、作業系統和資料庫基礎，並且利用課餘閒暇時間接案，在堅實的基礎上替您打造所需的程式。
                            </p>
                        </div>

                        <div class="bottom">
                            <div class="w-full h-full bg-white rounded-lg shadow-lg">
                                <img :src="about" alt="" class="w-full h-auto rounded-lg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="my-3 border-blueGray-300"/>

        <section id="service" class="py-20 bg-blueGray-200">
            <div class="container px-4 mx-auto md:px-14">
                <div class="w-full h-full">
                    <div class="text-center text">
                        <h3 class="text-3xl font-medium leading-normal">
                            我們所提供的服務
                        </h3>
                    </div>

                    <div class="mt-20 h-2/3">
                        <carousel :items="services"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-blueGray-200">
            <div class="container px-4 mx-auto md:px-14">
                <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                    <div class="bottom">
                        <div class="w-full h-full bg-white rounded-lg shadow-lg">
                            <img :src="services.algorithm.img" :alt="services.algorithm.title"
                                 class="w-full h-auto rounded-lg"/>
                        </div>
                    </div>

                    <div class="text">
                        <h3 class="mb-2 text-3xl font-medium leading-normal">
                            {{ services.algorithm.title }}、{{ services.thesis.title }}
                            、 {{ services.IndependentStudy.title }}
                        </h3>
                        <ol class="list-decimal list-inside">
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                把演算法邏輯製作流程圖，並且交由給業主核對才開始寫程式，減少開發中解決錯誤所額外花費的時間。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                並且使用TDD方式開發，減少開發中測試程式邏輯所花費的時間成本。
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <hr class="my-3 border-blueGray-300"/>

        <section class="py-20 bg-blueGray-200">
            <div class="container px-4 mx-auto md:px-14">
                <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                    <div class="h-full text">
                        <h3 class="mb-2 text-3xl font-medium leading-normal">
                            {{ services.corporation.title }}、{{ services.website.title }}
                        </h3>
                        <ol class="list-decimal list-inside">
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                RWD響應式網站技術，讓您的網站不管在哪種裝置上面都能夠正常顯示畫面。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                內建SEO搜尋引擎優化，增加網站被用戶搜尋到的機率。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                客製化畫面設計，製作專屬於您的網站。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                後台管理系統，讓您可以自由的修改網頁內容。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                並且使用TDD方式開發，減少開發中測試程式邏輯所花費的時間成本。
                            </li>
                        </ol>
                    </div>

                    <div class="bottom">
                        <div class="w-full h-full bg-white rounded-lg shadow-lg">
                            <img :src="services.corporation.img" :alt="services.corporation.title"
                                 class="w-full h-auto rounded-lg"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="py-20 bg-blueGray-800">
            <div class="container px-4 mx-auto md:px-14">
                <div class="w-full h-full">
                    <div class="mb-20 text-center text">
                        <h2 class="text-4xl font-medium leading-normal text-white">聯絡我們</h2>
                        <p class="mt-4 text-lg leading-relaxed text-blueGray-400">
                            如果我們收到訊息會盡快向您回復!
                        </p>
                    </div>
                    <div class="grid grid-cols-1 gap-5 place-items-stretch lg:grid-cols-2">
                        <contact-info class="info"></contact-info>
                        <message-form class="messageForm"></message-form>
                    </div>
                </div>
            </div>
        </section>

    </main>
</template>

<script>
import {onMounted} from "vue";
import Carousel from "../components/Carousel";
import About from "./About";
import ScrollReveal from "scrollreveal";
import MessageForm from "../components/MessageForm";
import ContactInfo from "../components/ContactInfo";

export default {
    components: {
        Carousel,
        About,
        MessageForm,
        ContactInfo
    },
    data() {
        return {
            cover: "../../../images/cover.png",
            about: "../../../images/about.jpg",
            services: {
                algorithm: {
                    title: "演算法程式設計",
                    img: "../../../images/algorithm.jpg"
                },
                IndependentStudy: {
                    title: "專題程式設計",
                    img: "../../../images/IndependentStudy.jpg"
                },
                thesis: {
                    title: "論文程式設計",
                    img: "../../../images/thesis.jpg"
                },
                website: {
                    title: "客製化網站服務",
                    img: "../../../images/website.jpg"
                },
                desktop: {
                    title: "桌面軟體設計",
                    img: "../../../images/desktop.jpg"
                },
                corporation: {
                    title: "品牌形象網站設計",
                    img: "../../../images/corporation.jpg"
                }
            },
        }
    },
    setup() {
        const setting = {
            duration: 2000,  // 動畫時間
            delay: 450,  // 動畫延遲時間}
            distance: "20%",
            reset: false
        };

        onMounted(() => {
                ScrollReveal(setting).reveal('.text', {origin: "top", duration: 1000, delay: 250});
                ScrollReveal(setting).reveal('.serviceBnt', {
                    origin: "bottom",
                    delay: 400
                });
                ScrollReveal(setting).reveal('.messageForm', {origin: "bottom", delay: 800});
                ScrollReveal(setting).reveal('.info', {origin: "top", delay: 500});
                ScrollReveal(setting).reveal('.top', {origin: "top"});
                ScrollReveal(setting).reveal('.bottom', {origin: "bottom"});
                ScrollReveal(setting).reveal('.show');
            }
        );
    }
}
</script>


