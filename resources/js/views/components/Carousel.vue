<template>
    <swiper
        :slides-per-view="1"
        :spaceBetween="10"
        :autoplay='{ "delay": 4000, "disableOnInteraction": false}'
        :breakpoints="{
            '640': {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            '768': {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            '1024': {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }"
        :lazy="true"
        :modules="modules"
    >
        <swiper-slide
            v-for="product in products"
            :key="product.name"
            class=""
        >
            <div class="w-36 w-full group">
                <div class="flex justify-center">
                    <img
                        :data-src="product.thumbnail"
                        class="object-contain w-36 h-24 grayscale transition duration-200 delay-75 swiper-lazy group-hover:grayscale-0"
                    >
                </div>
                <div class="mt-1">
                    <p class="leading-normal text-center truncate text-gray-400 group-hover:text-black">
                        {{ product.name }}
                    </p>
                </div>
            </div>

        </swiper-slide>
    </swiper>
</template>
<script>
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Lazy, Autoplay} from 'swiper';
import 'swiper/css';
import "swiper/css/lazy";

export default {
    props: {
        products: {
            type: Object,
            required: true
        }
    },
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Lazy, Autoplay],
        };
    }
}
</script>
