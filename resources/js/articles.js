import {createApp} from "vue";
import LikeButton from "./views/components/LikeButton";
import LoadingIcon from "./views/components/LoadingIcon";
import SideBox from "./views/components/SideBox";

const articlesApp = createApp({});
articlesApp.component('side-box', SideBox);
articlesApp.component('like-button', LikeButton);
articlesApp.component('loading-icon', LoadingIcon);
articlesApp.mount('#articles-app');


