import {createApp} from "vue";
import VueMarkdownEditor from '@kangc/v-md-editor/lib/codemirror-editor';
import '@kangc/v-md-editor/lib/style/codemirror-editor.css';
import githubTheme from '@kangc/v-md-editor/lib/theme/github.js';
import '@kangc/v-md-editor/lib/theme/style/github.css';
import MarkdownEditor from './views/components/Editor';

import hljs from 'highlight.js';
VueMarkdownEditor.use(githubTheme, {
    Hljs: hljs
});

// import zhTW from '@kangc/v-md-editor/lib/lang/zh-TW';
// VueMarkdownEditor.lang.use('zh-TW', zhTW);
// VueMarkdownEditor.lang.add({
//     'zh-TW': {
//         task: {
//             toolbar: '任務列表',
//             placeholder: '任務列表'
//         },
//         tip: {
//             toolbar: '插入提示',
//             tip: {
//                 toolbar: '提示',
//                 placeholder: '在此輸入內容',
//                 defaultTitle: '提示'
//             },
//             warning: {
//                 toolbar: '注意',
//                 placeholder: '在此輸入內容',
//                 defaultTitle: '注意'
//             },
//             danger: {
//                 toolbar: '警告',
//                 placeholder: '在此輸入內容',
//                 defaultTitle: '警告'
//             },
//             details: {
//                 toolbar: '詳細訊息',
//                 placeholder: '內容',
//                 defaultTitle: '詳細訊息'
//             }
//         },
//     }
// });

import Codemirror from 'codemirror';
import 'codemirror/mode/markdown/markdown';
import 'codemirror/mode/javascript/javascript';
import 'codemirror/mode/css/css';
import 'codemirror/mode/htmlmixed/htmlmixed';
import 'codemirror/mode/vue/vue';
import 'codemirror/addon/edit/closebrackets';
import 'codemirror/addon/edit/closetag';
import 'codemirror/addon/edit/matchbrackets';
import 'codemirror/addon/display/placeholder';
import 'codemirror/addon/selection/active-line';
import 'codemirror/addon/scroll/simplescrollbars';
import 'codemirror/addon/scroll/simplescrollbars.css';
import 'codemirror/lib/codemirror.css';

VueMarkdownEditor.Codemirror = Codemirror;

import createCopyCodePlugin from '@kangc/v-md-editor/lib/plugins/copy-code/index';
import createLineNumberPlugin from '@kangc/v-md-editor/lib/plugins/line-number/index';
import createTodoListPlugin from '@kangc/v-md-editor/lib/plugins/todo-list/index';
import createEmojiPlugin from '@kangc/v-md-editor/lib/plugins/emoji/index';
import createTipPlugin from '@kangc/v-md-editor/lib/plugins/tip/index';
import '@kangc/v-md-editor/lib/plugins/copy-code/copy-code.css';
import '@kangc/v-md-editor/lib/plugins/todo-list/todo-list.css';
import '@kangc/v-md-editor/lib/plugins/emoji/emoji.css';
import '@kangc/v-md-editor/lib/plugins/tip/tip.css';

VueMarkdownEditor.use(createTipPlugin());
VueMarkdownEditor.use(createEmojiPlugin());
VueMarkdownEditor.use(createTodoListPlugin());
VueMarkdownEditor.use(createLineNumberPlugin());
VueMarkdownEditor.use(createCopyCodePlugin());

const editor = createApp({});
editor.use(VueMarkdownEditor);
editor.component('markdown-editor', MarkdownEditor);
editor.mount('#markdown-editor');

