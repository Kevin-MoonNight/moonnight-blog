<template>
    <div :title="value"
         v-clipboard:copy="value"
         v-clipboard:success="onCopy"
         class="px-4 w-full text-center cursor-pointer group">

        <div
            class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
            <slot></slot>
        </div>
        <h5 class="mt-5 text-xl text-white group-hover:text-indigo-500">{{ title }}</h5>
        <p class="mt-2 mb-4 text-blueGray-400 group-hover:text-indigo-500">
            {{ value }}
        </p>
    </div>
</template>

<script>
import {onCopy} from "../../api/utils";

export default {
    props: {
        title: {
            type: String,
            required: true
        },
        value: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            onCopy: onCopy
        }
    }
}
</script>

