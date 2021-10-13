<template>
    <div class="grid grid-cols-1 gap-5 p-5 h-auto bg-white bg-opacity-80 rounded-md shadow-xl lg:grid-cols-3 md:w-2/3 lg:p-10">
        <div class="col-span-1">
            <div class="flex flex-col justify-center items-center">
                <img src="../../../images/headshot.jpg"
                     class="object-cover w-40 h-40 rounded-full">
                <div class="px-5 mt-10 space-x-3 w-full">
                    <a :href="githubLink"><i class="im im-github"/></a>
                    <a :href="youtubeLink"><i class="im im-youtube"/></a>
                    <a :href="lineLink"><i class="im im-line"/></a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 col-span-1 grid-rows-2 lg:col-span-2">
            <p class="text-black text-md md:text-lg">我是鄭政文，從高中開始接觸程式，參加過一些比賽得到一些不錯的名次，在大一的時後開始接案，並且持續增進自己的能力。</p>
            <div>
                <h3 class="mb-2 text-lg border-b-2 border-black md:text-xl">{{experience.title}}</h3>
                <ul class="list-disc list-inside text-gray-600 text-md md:text-lg">
                    <li v-for="content in experience.content">{{content}}</li>
                </ul>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-3">
            <h2 class="mb-3 text-lg md:text-xl">擅長工具</h2>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                <div v-for="tool in tools">
                    <h3 class="mb-2 text-lg border-b-2 border-black md:text-xl">{{tool.title}}</h3>
                    <ul class="list-disc list-inside text-gray-600 text-md md:text-lg">
                        <li v-for="content in tool.content">{{content}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                githubLink:"https://github.com/Kevin-MoonNight",
                youtubeLink:"",
                lineLink:"",
                experience: {
                    title: "經歷",
                    content: ["全國高級中等學校技藝競賽-電腦軟體設計第二名", "北區高中職程式設計競賽第二名", "青年程式設計競賽第三名"]
                },
                tools:[
                    {
                        title:"桌面",
                        content:["C#","Java","VB.NET"]
                    },
                    {
                        title:"網頁",
                        content:["TailwindCss、Bootstrap","Vue.js、React.js","Laravel"]
                    },
                    {
                        title:"其他",
                        content:["GitHub","MySQL"]
                    },
                ]
            }
        }
    }
</script>
