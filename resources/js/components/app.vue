<template>
    <router-view></router-view>
</template>

<script>
    import {watchEffect} from "vue";
    import {useStore} from "vuex";
    import {addToken,deleteToken} from "../api/https";

    export default {
        setup(){
            const store = useStore()
            //更新TOKEN
            watchEffect(()=>{
                const token = store.state.auth.token;
                if(token !== null){
                    addToken(token);
                }else{
                    deleteToken();
                }
            })
        }
    }
</script>
