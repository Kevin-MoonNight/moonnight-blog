<template>
    <input v-model="text"
           :id="name"
           :name="name"
           type="text"
           :placeholder="placeholder"
           class="block px-3 py-2 mt-1 w-full bg-white rounded-md border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
    >
</template>

<script>
import {computed} from "vue";

export default {
    props: {
        value: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        placeholder: {
            type: String,
            required: true
        },
    },
    emits: ["update:value"],
    setup(props, {emit}) {
        const text = computed({
            get: () => props.value,
            set: val => emit("update:value", val),
        });

        return {
            text
        };
    }
}
</script>
