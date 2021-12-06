<template>
    <label :for="htmlFor"
           class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
        <slot></slot>
    </label>
</template>

<script>
export default {
    props: {
        htmlFor: {
            type: String
        }
    }
}
</script>
