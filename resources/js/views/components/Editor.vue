<template>
    <ckeditor :editor="editor" :content="content" @ready="onReady"></ckeditor>
</template>

<script>
import DecoupledEditor from "@ckeditor/ckeditor5-build-decoupled-document";
import {toRefs} from "vue";

export default {
    props: {
        content: {
            type: String
        }
    },
    data() {
        return {
            editor: DecoupledEditor,
        };
    },
    setup(props) {
        const {content} = toRefs(props);

        function onReady(editor) {
            // Insert the toolbar before the editable area.
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        }

        return {
            content,
            onReady
        }
    }
}
</script>
