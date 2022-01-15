// require('./bootstrap');
import {createApp} from 'vue';
import {store} from './store/index';
import {VueClipboard} from '@soerenmartius/vue3-clipboard';
// import CKEditor from '@ckeditor/ckeditor5-vue';
import VueLazyLoad from 'vue3-lazyload';


import Carousel from "./views/components/Carousel";
import SideBox from "./views/components/SideBox";
import ContactItem from "./views/components/ContactItem";
import GoogleMaps from "./views/components/GoogleMaps";
import NavItem from "./views/components/NavItem";
import DropDown from "./views/components/DropDown";

const app = createApp({});
app.use(VueLazyLoad);
app.use(store);
app.use(VueClipboard);
// app.use(CKEditor);

app.component('carousel', Carousel);
app.component('side-box', SideBox);
app.component('contact-item', ContactItem);
app.component('google-maps', GoogleMaps);
app.component('nav-item', NavItem);
app.component('drop-down',DropDown);

app.mount('#app');
