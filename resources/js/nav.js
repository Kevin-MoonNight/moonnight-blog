import {createApp} from "vue";
import Navigation from "./views/components/Navigation";
import LinkScroll from "./views/components/LinkScroll";
import LinkScrollMobile from "./views/components/LinkScrollMobile";

const navApp = createApp({});
navApp.component('navigation', Navigation);
navApp.component('link-scroll', LinkScroll);
navApp.component('link-scroll-mobile', LinkScrollMobile);
navApp.mount('#nav-app');
