<template>
    <VueWriter :array="arr"/>
</template>

<script>
import VueWriter from 'vue-writer'

export default {
    components: {VueWriter},
    data() {
        return {arr: ["慕耐程式工作室"]};
    },
}
</script>
<style>
.is-typed span.cursor {
    display: inline-block;
    width: 3px;
    margin-right: 5px;
    background-color: black;
    animation: blink 1s infinite;
    user-select: none;
}

.is-typed span.underscore {
    display: inline-flex;
    width: 10px;
    height: 1px;
    margin-right: 5px;
    align-items: flex-end;
    background-color: black;
    animation: blink 1s infinite;
}

.is-typed span.cursor.typing {
    animation: none;
}

@keyframes blink {
    49% {
        background-color: black;
    }
    50% {
        background-color: transparent;
    }
    99% {
        background-color: transparent;
    }
}
</style>
