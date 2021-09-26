import { createApp } from 'vue';
import { router } from './routes';
import RootComponent from './components/app.vue';
import { store } from './store/index';
import { VueClipboard } from '@soerenmartius/vue3-clipboard'
import CKEditor from '@ckeditor/ckeditor5-vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
library.add(fas,fab,far);


const app = createApp(RootComponent);
// app.config.globalProperties.$http=axios
app.use(router);
app.use(store);
app.use(VueClipboard);
app.use(CKEditor);

app.component('fa',FontAwesomeIcon);
app.mount('#app');
