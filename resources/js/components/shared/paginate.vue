<template>
    <paginate
        v-model="page"
        :page-count="20"
        :margin-pages="2"
        :page-range="5"
        :container-class="'pagination'"
        :page-class="'page-item'"
        :page-link-class="'page-link-item'"
        :prev-class="'prev-item'"
        :prev-link-class="'prev-link-item'"
        :next-class="'next-item'"
        :next-link-class="'next-link-item'"
        :break-view-class="'break-view'"
        :break-view-link-class="'break-view-link'"
        :first-last-button="true"
    ></paginate>
</template>

<script>
    import Paginate from 'vuejs-paginate';
    export default{
        name:'pagination',
        components:{
            Paginate
        },
        data:function (){
            return {
                currentPage:this.pageNum
            }
        },
        props:{
            pageNum:{
                type:Number,
                default:1
            },
            totalPageCount:{
                type:Number
            }
        },
        methods:{
            changePage:function (num){
                this.currentPage = num;
                this.$emit('updatePageNum',num)
            }
        }

    }
</script>
