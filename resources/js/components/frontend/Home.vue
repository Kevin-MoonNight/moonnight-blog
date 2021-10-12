<template>
    <div id="area" class="select-none">
        <section>
            <div class="flex flex-col items-center w-full max-w-screen-xl h-full min-h-screen p-5">
                <h1 class="my-10 text-3xl md:text-4xl">關於我</h1>
                <about class="about" />
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
    import {onMounted} from "vue";
    import Carousel from "./Carousel";
    import About from "./About";
    import ScrollReveal from "scrollreveal";
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
                        content:"專門解決論文所需要的演算法程式"
                    },
                    {
                        title:"網站設計",
                        content:"開發出符合您需求的網站"
                    },
                    {
                        title:"桌面應用程式設計",
                        content:"設計出您喜歡的軟體"
                    },
                ],
            }
        },
        setup(){
            // let cn;
            //
            onMounted(()=>{
                // const config = {
                //     color: '0,0,0',
                //     count: 88,
                // };
                // const element = document.querySelector("#area");
                // cn = new CanvasNest(element, config);
                ScrollReveal({
                    // 參數設定[註1]
                    origin: "right",  // 起始位置
                    distance: "10%",  // 距離
                    duration: 1000,  // 動畫時間
                    delay: 300,  // 動畫延遲時間
                    rotate: { x: 0, y: 0, z: 0 },  // 旋轉角度
                    opacity: 0,  // 透明度
                    scale: 1, // 縮放比例
                    easing: "ease-in-out", // 動畫速度曲線
                    container: document.documentElement, // 外層
                    mobile: true, // 支援行動裝置
                    reset: true, // 每次都啟動動畫
                    useDelay: "always", // 延遲動畫次數
                    viewFactor: 0.2, // 當該物件在可視範圍內，則顯示此物件(0.2表示可視範圍20%)
                    viewOffset: { top: 0, right: 0, bottom: 0, left: 0 }, // 當外層有設定間隔造成偏移，則請設定在此維持精準度
                }).reveal('.about');
            });
            // onUnmounted(()=>{
            //     cn.destroy();
            // })
        }
    }
</script>


