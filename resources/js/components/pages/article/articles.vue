<template>
    <div class="flex justify-center min-h-screen">

        <transition name="fade">
                <div v-if="isLoading" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full max-w-screen-xl">
                    <div v-for="article in articles" :key="article.id">
                        <div v-bind:title="article.title" @click="showArticle(article.id)" class="bg-gray-100 my-20">
                            <div class="bg-white mx-auto shadow-xl rounded-lg hover:scale-105 hover:shadow-xl transform transition duration-200">
                                <div class="py-4 px-8">

                                    <div class="flex space-x-3 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>

                                        <div class="text-gray-500">{{ date(article.created_at) + "．" + article.user.name }}</div>
                                    </div>

                                    <div class="py-4 h-96 overflow-hidden">
                                        <h1 class="hover:cursor-pointer font-bold text-2xl break-words">{{article.title}}</h1>
                                        <p v-html="article.content" class="hover:cursor-pointer py-3 text-gray-600"></p>
                                    </div>

                                    <div class="flex items-end mt-5">
                                        <div class="h-12 overflow-x-auto">
                                            <span v-for="tag in article.tags" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm m-2">{{tag.name}}</span>
                                        </div>
                                    </div>

                                    <p>
                                        {{article.views}} views
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </transition>
    </div>

</template>

<script>
import moment from "moment";
import paginate from "../../shared/paginate";

export default {
    components: {
        paginate
    },
    data:function (){
        return {
            articles:[],
            isLoading:false
        }
    },
    methods:{
        showArticle:function(id){
            this.$router.push({ name: 'article', params: { id: id }})
        },
        date:function (created_at){
            return moment(created_at).format('Y-m-d')
        },
    },
    async beforeCreate() {
        const instance = axios.create({
            baseURL: 'http://localhost/api',
        });
        const url ='articles/tag/'+ this.$route.params.name;

        await instance.get(url)
            .then((response) => {
                this.articles = response.data;

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
