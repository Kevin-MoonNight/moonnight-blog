<template>
    <select v-model="selected"
            :id="name"
            :name="name"
            :multiple="multiple"
            class="block px-3 py-2 mt-1 bg-white rounded-md border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
    >
        <slot></slot>
    </select>
</template>

<script>
import {computed} from "vue";

export default {
    props: {
        value: {
            required: true
        },
        name: {
            type: String,
            required: true
        },
        multiple: {
            type: Boolean,
            default: false
        }
    },
    emits: ["update:value"],
    setup(props, {emit}) {
        const selected = computed({
            get: () => props.value,
            set: val => emit("update:value", val),
        });

        return {
            selected
        };
    },
}
</script>
