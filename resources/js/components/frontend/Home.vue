<template>
    <div id="area" class="select-none">
        <section>
            <div class="flex flex-col items-center w-full max-w-screen-xl h-full min-h-screen p-5">
                <h1 class="my-10 text-3xl md:text-4xl">關於我</h1>
                <about />
            </div>
        </section>
        <section>
            <div class="flex flex-col items-center w-full max-w-screen-xl h-full h-screen">
                <h1 class="mt-20 text-3xl md:text-4xl">我們所提供的服務</h1>
                <carousel :items="slides" />
            </div>
        </section>
    </div>
</template>

<script>
    import {onMounted, onUnmounted} from "vue";
    import Carousel from "./Carousel";
    import About from "./About";
    // import CanvasNest from 'canvas-nest.js';

    export default {
        components: {
            Carousel,
            About
        },
        data(){
            return {
                slides:[
                    {
                        title:"演算法程式設計",
                        content:"專門解決論文所需要的演算法程式",
                        imgSrc:'/image/algorithm.jpg'
                    },
                    {
                        title:"網站設計",
                        content:"開發出符合您需求的網站",
                        imgSrc:'/image/website.jpg'
                    },
                    {
                        title:"桌面應用程式設計",
                        content:"設計出您喜歡的軟體",
                        imgSrc:'/image/desktop.jpg'
                    },
                ],
            }
        },
        setup(){
            // let cn;
            //
            // onMounted(()=>{
            //     const config = {
            //         color: '0,0,0',
            //         count: 88,
            //     };
            //     const element = document.querySelector("#area");
            //     cn = new CanvasNest(element, config);
            // });
            // onUnmounted(()=>{
            //     cn.destroy();
            // })
        }
    }
</script>


