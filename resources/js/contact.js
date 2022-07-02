import {createApp} from "vue";
import GoogleMaps from "./views/components/GoogleMaps";

const contactApp = createApp({});
contactApp.component('google-maps', GoogleMaps);
contactApp.mount('#contact-app');
