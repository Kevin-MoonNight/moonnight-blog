import {createApp} from 'vue';
import {router} from './routes';
import RootComponent from './views/app.vue';
import {store} from './store/index';
import {VueClipboard} from '@soerenmartius/vue3-clipboard';
import CKEditor from '@ckeditor/ckeditor5-vue';
import {createMetaManager} from 'vue-meta';
import {plugin as vueMetaPlugin} from 'vue-meta';
import VueLazyLoad from 'vue3-lazyload';

const app = createApp(RootComponent);
app.use(VueLazyLoad);
app.use(router);
app.use(store);
app.use(VueClipboard);
app.use(CKEditor);
app.use(createMetaManager());
app.use(vueMetaPlugin);
app.mount('#app');
