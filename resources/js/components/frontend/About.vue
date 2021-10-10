<template>
    <div class="grid grid-cols-1 lg:grid-cols-3 md:w-2/3 h-auto gap-5 p-5 lg:p-10 bg-white rounded-md shadow-xl">
        <div class="col-span-1">
            <div class="flex flex-col justify-center items-center">
                <img src="/image/headshot.jpg"
                     class="h-40 w-40 rounded-full object-cover">
                <div class="mt-10 w-full px-5 space-x-3">
                    <a :href="githubLink"><i class="im im-github"/></a>
                    <a :href="youtubeLink"><i class="im im-youtube"/></a>
                    <a :href="lineLink"><i class="im im-line"/></a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 grid-rows-2 col-span-1 lg:col-span-2">
            <p class="text-md md:text-lg text-black">我是鄭政文，從高中開始接觸程式，參加過一些比賽得到一些不錯的名次，在大一的時後開始接案，並且持續增進自己的能力。</p>
            <div>
                <h3 class="text-lg md:text-xl mb-2 border-b-2 border-black">{{experience.title}}</h3>
                <ul class="list-disc list-inside text-md md:text-lg text-gray-600">
                    <li v-for="content in experience.content">{{content}}</li>
                </ul>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-3">
            <h2 class="text-lg md:text-xl mb-3">擅長工具</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div v-for="tool in tools">
                    <h3 class="text-lg md:text-xl mb-2 border-b-2 border-black">{{tool.title}}</h3>
                    <ul class="list-disc list-inside text-md md:text-lg text-gray-600">
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
                    content: ["全國高級中等學校技藝競賽-電腦軟體設計金手獎第二名", "北區高中職程式設計競賽第二名", "青年程式設計競賽第三名"]
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
