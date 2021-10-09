<template >
    <div id="area" class="select-none">
        <section>
            <div class="flex items-center justify-center h-2/3 w-full max-w-screen-xl md:w-2/3 border-green-400 border-4">
                <div class="border w-full flex justify-end">
                    <div class="p-5 rounded-md bg-white  shadow-xl text-gray-700 max-w-sm ">
                        <div class="space-y-5 text-md md:text-lg">
                            <p class="text-2xl">關於我</p>
                            <p class="">就讀學校：高雄科技大學　資訊工程系</p>
                            <p class="">全國高級中等學校技藝競賽-電腦軟體設計金手獎第二名</p>
                            <p class="">北區高中職程式設計競賽第二名</p>
                            <p class="">青年程式設計競賽第三名</p>
                        </div>

                        <div class="mt-10 space-y-5 text-md md:text-lg">
                            <p class="">我是鄭政文，從高中開始接觸程式，參加過一些比賽得到一些不錯的名次，在大一的時後開始接案，並且持續增進自己的能力。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="flex flex-col items-center w-full max-w-screen-xl h-full">
                <h1 class="mt-20 text-3xl md:text-4xl ">我們所提供的服務</h1>
                <carousel :items="slides" />
            </div>
        </section>
    </div>
</template>

<script>
    import {onMounted, onUnmounted} from "vue";
    import Carousel from "./Carousel";
    // import CanvasNest from 'canvas-nest.js';

    export default {
        components: {
            Carousel
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
                ]
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


