<template>
    <v-md-editor
        v-model="text"
        height="500px"
        :placeholder="placeholder"
        @copy-code-success="handleCopyCodeSuccess"
        @upload-image="handleUploadImage"
        left-toolbar="undo redo clear | h bold italic strikethrough quote | ul ol table hr | link image code emoji| save"
    ></v-md-editor>
    <textarea
        hidden
        :name="name"
        v-model="text"
    ></textarea>
</template>

<script>
import {ref} from "vue";

export default {
    props: {
        name: {
            type: String,
            required: true
        },
        placeholder: {
            type: String,
            required: true
        },
        value: {
            type: String,
            required: false
        }
    },
    setup(props) {
        const text = ref('');
        text.value = props.value ? props.value : '';

        const handleCopyCodeSuccess = () => {
            //todo 新增notice訊息
        };

        const handleUploadImage = (event, insertImage, files) => {
            // Get the files and upload them to the file server, then insert the corresponding content into the editor
            console.log(files);

            // Here is just an example
            insertImage({
                url:
                    'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=1269952892,3525182336&fm=26&gp=0.jpg',
                desc: 'desc',
                // width: 'auto',
                // height: 'auto',
            });
        };

        return {
            text,
            handleCopyCodeSuccess,
            handleUploadImage
        }
    }
}
</script>
