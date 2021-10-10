<template>
    <swiper :loop="true" :pagination='{"clickable": true}' :autoplay='{ "delay": 3000, "disableOnInteraction": false}'
            class="w-full h-full">

        <swiper-slide v-for="item in items" :key="item"
                      class="flex justify-center items-center p-5">

            <div id="card" data-tilt data-tilt-reverse="true" data-tilt-max="5"
                 class="flex flex-col justify-center items-center w-full max-w-3xl h-2/3 bg-white rounded-md shadow-md">

                <p class="mb-5 text-2xl md:text-3xl">{{item.title}}</p>
                <p class="mb-12 text-lg md:text-xl text-gray-600">{{item.content}}</p>
                <router-link to="/contact">
                    <p class="py-3 px-10 text-lg md:text-xl bg-white border-2 border-black rounded-2xl">聯絡我們</p>
                </router-link>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script>
    import {onMounted} from "vue";
    import VanillaTilt from 'vanilla-tilt';
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import "swiper/css/pagination"
    import "swiper/css/navigation"
    import SwiperCore, {
        Autoplay,Pagination,Navigation
    } from 'swiper';
    // install Swiper modules
    SwiperCore.use([Autoplay,Pagination,Navigation]);
    export default {
        props:['items'],
        components: {
            Swiper,
            SwiperSlide,
        },
        setup(){
            let cards;
            onMounted(()=>{
                cards = document.querySelectorAll("#card");
                VanillaTilt.init(cards);
            });
        }
    }
</script>
