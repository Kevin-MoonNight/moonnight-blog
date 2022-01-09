<template>
    <div class="p-3 bg-white rounded-md shadow-md">
        <h1 class="text-center">{{ name }}</h1>
        <hr class="my-3 border-blueGray-200"/>
        <div class="flex flex-wrap gap-2 w-full">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        name: {
            type: String,
            required: true
        }
    }
}
</script>
