import {createApp} from "vue";
import {VueClipboard} from "@soerenmartius/vue3-clipboard";
import Clipboard from "./views/components/Clipboard";

const clipboardApp = createApp({});
clipboardApp.use(VueClipboard);
clipboardApp.component('clipboard', Clipboard);
clipboardApp.mount('#clipboard-app');
