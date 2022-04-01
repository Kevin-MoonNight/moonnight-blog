import {createApp} from "vue";
import VMdPreview from '@kangc/v-md-editor/lib/preview';
import '@kangc/v-md-editor/lib/style/preview.css';
import githubTheme from '@kangc/v-md-editor/lib/theme/github.js';
import '@kangc/v-md-editor/lib/theme/style/github.css';
import PreviewMarkdown from "./views/components/PreviewMarkdown";

import hljs from 'highlight.js';
VMdPreview.use(githubTheme, {
    Hljs: hljs,
});

import createTipPlugin from '@kangc/v-md-editor/lib/plugins/tip/index';
import '@kangc/v-md-editor/lib/plugins/tip/tip.css';
VMdPreview.use(createTipPlugin());

import createEmojiPlugin from '@kangc/v-md-editor/lib/plugins/emoji/index';
import '@kangc/v-md-editor/lib/plugins/emoji/emoji.css';
VMdPreview.use(createEmojiPlugin());

import createTodoListPlugin from '@kangc/v-md-editor/lib/plugins/todo-list/index';
import '@kangc/v-md-editor/lib/plugins/todo-list/todo-list.css';
VMdPreview.use(createTodoListPlugin());

import createLineNumberPlugin from '@kangc/v-md-editor/lib/plugins/line-number/index';
VMdPreview.use(createLineNumberPlugin());

import createCopyCodePlugin from '@kangc/v-md-editor/lib/plugins/copy-code/index';
import '@kangc/v-md-editor/lib/plugins/copy-code/copy-code.css';
VMdPreview.use(createCopyCodePlugin());

const preview = createApp({});
preview.use(VMdPreview);
preview.component('preview-markdown', PreviewMarkdown);
preview.mount('#markdown-preview');
