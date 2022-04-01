<template>
    <v-md-preview
        :text="text"
        @copy-code-success="handleCopyCodeSuccess"
    ></v-md-preview>
</template>

<script>
export default {
    data() {
        const handleCopyCodeSuccess = () => {
            //todo 新增notice訊息
        };

        return {
            text: '',
            handleCopyCodeSuccess
        };
    },
};
</script>
