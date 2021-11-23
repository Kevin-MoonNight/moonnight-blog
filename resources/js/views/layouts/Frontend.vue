<template>
    <navigation-menu/>
    <router-view></router-view>
    <footerComponent/>
</template>
<script>

import NavigationMenu from '../frontend/TheNavigation';
import FooterComponent from "../components/TheFooter";

export default {
    components: {
        NavigationMenu,
        FooterComponent
    }
}
</script>
