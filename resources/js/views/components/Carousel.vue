<template>
    <swiper :modules="modules" :slides-per-view="'auto'" :spaceBetween="30" :centeredSlides="true" :loop="true"
            :pagination='{"clickable": true}'
            :autoplay='{ "delay": 3000, "disableOnInteraction": false}'
            class="h-full">

        <swiper-slide v-for="item in items" :key="item" class="flex justify-center max-w-md">
            <div id="card" data-tilt data-tilt-reverse="true" data-tilt-max="8"
                 class="p-5 m-5 w-full max-w-md h-4/5 bg-white rounded-md shadow-md">
                <div class="flex object-cover justify-center">
                    <img :src="item.img" :alt="item.title" class="w-auto max-h-40">
                </div>

                <div class="h-full text-center break-words">
                    <p class="text-2xl text-blueGray-600">{{ item.title }}</p>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script>
import {onMounted} from "vue";
import VanillaTilt from 'vanilla-tilt';
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Autoplay, Navigation} from 'swiper';
import 'swiper/css';
import "swiper/css/pagination"
import "swiper/css/navigation"

export default {
    props: ['items'],
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        let cards;
        onMounted(() => {
            cards = document.querySelectorAll("#card");
            VanillaTilt.init(cards);
        });

        return {
            modules: [Navigation, Autoplay],
        };
    }
}
</script>
