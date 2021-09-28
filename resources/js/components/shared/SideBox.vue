<template>
    <div class="p-3 bg-white rounded-md shadow-md">
        <h1 class="w-full pb-3 text-center">{{ name }}</h1>
        <div class="flex flex-wrap w-full gap-2">
            <slot />
        </div>
    </div>
</template>
<script>
    export default {
        props:['name']
    }
</script>
