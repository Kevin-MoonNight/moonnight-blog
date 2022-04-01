import {createApp} from "vue";
import ContactItem from "./views/components/ContactItem";
import GoogleMaps from "./views/components/GoogleMaps";
import {VueClipboard} from "@soerenmartius/vue3-clipboard";

const contactApp = createApp({});
contactApp.use(VueClipboard);
contactApp.component('contact-item', ContactItem);
contactApp.component('google-maps', GoogleMaps);
contactApp.mount('#contact-app');
