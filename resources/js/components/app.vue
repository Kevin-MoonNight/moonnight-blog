<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
        <footerComponent></footerComponent>
    </div>
</template>

<script>
    import navbar from './shared/navbarComponent.vue';
    import footerComponent from "./shared/footerComponent.vue";
    export default {
        components: {
            navbar,
            footerComponent
        }
    }
</script>
