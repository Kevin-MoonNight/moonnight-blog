<template>
    <div>
        <div class="section">
            <div class="relative flex items-center justify-center h-2/3 w-full md:w-2/3 max-w-screen-xl">

                <div class="h-full w-full rounded-md bg-gray-300">
                    <div class="h-full transform -rotate-2 rounded-md bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 bg-blend-normal"></div>
                </div>

                <div class="absolute md:px-10">
                    <div class="card">

                        <div class="flex justify-between" >
                            <p class="text-4xl text-black">關於我</p>
<!--                            <img class="border-2 border-black rounded-full w-28 h-28 md:w-40 md:h-40 bg-gray-400" src="./image/dog.jpg" alt="圖像載入中....">-->
                        </div>

                        <div class="p-10">
                            <div class="space-y-5 text-md md:text-xl text-gray-700">
                                <p class="">就讀學校： 高雄科技大學　資訊工程系</p>
                                <p class="">全國高級中等學校技藝競賽-電腦軟體設計金手獎第二名</p>
                                <p class="">北區高中職程式設計競賽第二名</p>
                                <p class="">青年程式設計競賽第三名</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="section">
            <div class="relative flex items-center justify-center h-2/3 w-full md:w-2/3 max-w-screen-xl">

                <div class="h-full w-full rounded-md bg-gray-300">
                    <div class="h-full transform -rotate-2 rounded-md bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 bg-blend-normal"></div>
                </div>

                <div class="absolute grid lg:grid-cols-3 gap-5 md:p-10 ">

                    <div class="card transform shadow-xl hover:scale-105 duration-500">
                        <p class="text-xl md:text-3xl mb-5">演算法程式設計</p>
                        <p class="text-lg md:text-xl text-gray-600">專門解決論文所需要的演算法</p>
                    </div>

                    <div class="card transform shadow-xl  hover:scale-105 duration-500">
                        <p class="text-xl md:text-3xl mb-5">網頁程式設計</p>
                        <p class="text-lg md:text-xl text-gray-600">設計出您想要的網站</p>
                    </div>

                    <div class="card transform shadow-xl hover:scale-105 duration-500">
                        <p class="text-xl md:text-3xl mb-5">桌面應用程式設計</p>
                        <p class="text-lg md:text-xl text-gray-600">設計出您喜歡的軟體</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
