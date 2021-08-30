
<template>
    <div class="flex justify-center items-center py-10">
        <div class="w-full md:w-4/5 h-full min-h-screen max-w-screen-xl p-10 rounded-xl bg-white shadow-xl">

            <transition name="fade">
                <div v-if="isLoading" class="space-y-10">

                        <div class="flex items-center space-x-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>

                            <div class="text-gray-500">{{date(article.created_at) + "．" + article.user.name}}</div>

                        </div>

                        <div class="min-h-screen">
                            <div class="text-5xl pb-10 break-words"> {{article.title}} </div>
                            <div v-html="article.content" class="text-2xl"></div>
                        </div>

                        <div v-for="tag in article.tags" class="flex">
                            <span class="bg-gray-200 rounded-full px-3 py-1 text-sm m-2">{{tag.name}}</span>
                        </div>

                        <div class="grid grid-cols-2">
                            <p class="">{{article.views}} views</p>

                            <p v-on:click="fallback" class="flex justify-end hover:text-black text-gray-600">回文章列表</p>
                        </div>

                </div>
            </transition>

        </div>
    </div>
</template>

<script>
    import moment from "moment";

    export default {
        data:function (){
            return{
                article:{
                    title: '',
                    content:'',
                    views: 0,
                    created_at: '',
                    tags: [],
                    user: {
                        name: '',
                    }
                },
                isLoading:false
            }
        },
        methods:{
            fallback:function (){
                this.$router.push({name:'articleList'})
            },
            date:function (created_at){
                return moment(created_at).format('Y-m-d')
            }
        },
        async beforeCreate() {
            const instance = axios.create({
                baseURL: 'http://localhost/api',
            });

            //新增觀看數
            let url ='/articles/addView/'+ this.$route.params.id;
            await instance.get(url)
                .catch((response) =>{
                    console.log(response);
                });

            //獲取文章資料
            url ='/articles/'+ this.$route.params.id;
            await instance.get(url)
                .then((response) => {
                    this.article = response.data;

                    //如果沒有文章
                    if(response.data === null){
                        this.$router.push({ name: 'home'});
                    }
                })
                .catch((response) =>{
                    console.log(response);
                });

            this.isLoading = true;
        },

    }
</script>
