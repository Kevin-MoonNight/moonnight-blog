<template>
    <navigation-menu />
    <router-view></router-view>
    <footerComponent />
</template>
<script>

import NavigationMenu from '../frontend/NavigationMenu';
import FooterComponent from "../frontend/FooterComponent";

export default {
    components: {
        NavigationMenu,
        FooterComponent
    }
}
</script>
