import {createApp} from "vue";
import CoverTitle from "./views/components/CoverTitle";
import Carousel from "./views/components/Carousel";

const homeApp = createApp({});
homeApp.component('cover-title', CoverTitle);
homeApp.component('carousel', Carousel);
homeApp.mount('#home-app');
