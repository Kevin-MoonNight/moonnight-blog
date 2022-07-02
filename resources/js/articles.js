import {createApp} from "vue";
import LoadingIcon from "./views/components/LoadingIcon";

const articlesApp = createApp({});
articlesApp.component('loading-icon', LoadingIcon);
articlesApp.mount('#articles-app');


