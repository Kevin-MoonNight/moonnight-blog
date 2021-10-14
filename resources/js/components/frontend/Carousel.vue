<template>
    <swiper :modules="modules" :slides-per-view="1" :loop="true" :pagination='{"clickable": true}' :autoplay='{ "delay": 3000, "disableOnInteraction": false}'
            class="w-full h-full">

        <swiper-slide v-for="item in items" :key="item"
                      class="flex justify-center items-center p-5">

            <div id="card" data-tilt data-tilt-reverse="true" data-tilt-max="5"
                 class="flex flex-col justify-center items-center p-5 w-full max-w-3xl h-2/3 bg-white rounded-md shadow-md">
                <div class="h-full text-center">
                    <div class="h-2/3">
                        <img :src="item.imgSrc" :alt="item.title"
                             class="object-contain h-full">
                    </div>

                    <div class="p-2 h-1/3">
                        <p class="mb-5 text-2xl md:text-3xl">{{item.title}}</p>
                        <p class="text-lg text-gray-600 md:text-xl">{{item.content}}</p>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script>
    import {onMounted} from "vue";
    import VanillaTilt from 'vanilla-tilt';
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import {Autoplay,Pagination,Navigation} from 'swiper';
    import 'swiper/css';
    import "swiper/css/pagination"
    import "swiper/css/navigation"

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

            return {
                modules: [Navigation, Pagination, Autoplay],
            };
        }
    }
</script>
