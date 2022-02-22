// require('./bootstrap');
import {createApp} from 'vue';
import {store} from './store/index';
import {VueClipboard} from '@soerenmartius/vue3-clipboard';
import VueLazyLoad from 'vue3-lazyload';

import Carousel from "./views/components/Carousel";
import SideBox from "./views/components/SideBox";
import ContactItem from "./views/components/ContactItem";
import GoogleMaps from "./views/components/GoogleMaps";
import NavItem from "./views/components/NavItem";
import DropDown from "./views/components/DropDown";
import AvatarsSelector from "./views/components/AvatarsSelector";
import LikeButton from "./views/components/LikeButton";

const app = createApp({});
app.use(VueLazyLoad);
app.use(store);
app.use(VueClipboard);
app.component('carousel', Carousel);
app.component('side-box', SideBox);
app.component('contact-item', ContactItem);
app.component('google-maps', GoogleMaps);
app.component('nav-item', NavItem);
app.component('drop-down', DropDown);
app.component('avatars-selector', AvatarsSelector);
app.component('like-button', LikeButton);
app.mount('#app');

import VueMarkdownEditor from '@kangc/v-md-editor/lib/codemirror-editor';
import '@kangc/v-md-editor/lib/style/codemirror-editor.css';
import githubTheme from '@kangc/v-md-editor/lib/theme/github.js';
import '@kangc/v-md-editor/lib/theme/style/github.css';

// Resources for the codemirror editor
import Codemirror from 'codemirror';
// highlightjs
import hljs from 'highlight.js';

// mode
import 'codemirror/mode/markdown/markdown';
import 'codemirror/mode/javascript/javascript';
import 'codemirror/mode/css/css';
import 'codemirror/mode/htmlmixed/htmlmixed';
import 'codemirror/mode/vue/vue';
// edit
import 'codemirror/addon/edit/closebrackets';
import 'codemirror/addon/edit/closetag';
import 'codemirror/addon/edit/matchbrackets';
// placeholder
import 'codemirror/addon/display/placeholder';
// active-line
import 'codemirror/addon/selection/active-line';
// scrollbar
import 'codemirror/addon/scroll/simplescrollbars';
import 'codemirror/addon/scroll/simplescrollbars.css';
//plugin
import createCopyCodePlugin from '@kangc/v-md-editor/lib/plugins/copy-code/index';
import createLineNumberPlugin from '@kangc/v-md-editor/lib/plugins/line-number/index';
import createTodoListPlugin from '@kangc/v-md-editor/lib/plugins/todo-list/index';
import createEmojiPlugin from '@kangc/v-md-editor/lib/plugins/emoji/index';
import createTipPlugin from '@kangc/v-md-editor/lib/plugins/tip/index';
// style
import 'codemirror/lib/codemirror.css';
import '@kangc/v-md-editor/lib/plugins/copy-code/copy-code.css';
import '@kangc/v-md-editor/lib/plugins/todo-list/todo-list.css';
import '@kangc/v-md-editor/lib/plugins/emoji/emoji.css';
import '@kangc/v-md-editor/lib/plugins/tip/tip.css';
//lang
import zhTW from '@kangc/v-md-editor/lib/lang/zh-TW';
//component
import MarkdownEditor from './views/components/Editor';

VueMarkdownEditor.use(githubTheme, {
    Hljs: hljs
});
VueMarkdownEditor.lang.use('zh-TW', zhTW);
VueMarkdownEditor.Codemirror = Codemirror;

VueMarkdownEditor.use(createTipPlugin());
VueMarkdownEditor.use(createEmojiPlugin());
VueMarkdownEditor.use(createTodoListPlugin());
VueMarkdownEditor.use(createLineNumberPlugin());
VueMarkdownEditor.use(createCopyCodePlugin());

const editor = createApp({});
editor.use(VueMarkdownEditor);
editor.component('markdown-editor', MarkdownEditor);
editor.mount('#editor');

import VMdPreview from '@kangc/v-md-editor/lib/preview';
import '@kangc/v-md-editor/lib/style/preview.css';
import PreviewMarkdown from "./views/components/PreviewMarkdown";

VMdPreview.use(githubTheme, {
    Hljs: hljs,
});
VMdPreview.use(createTipPlugin());
VMdPreview.use(createEmojiPlugin());
VMdPreview.use(createTodoListPlugin());
VMdPreview.use(createLineNumberPlugin());
VMdPreview.use(createCopyCodePlugin());

const preview = createApp({});
preview.use(VMdPreview);
preview.component('preview-markdown', PreviewMarkdown);
preview.mount('#preview');
