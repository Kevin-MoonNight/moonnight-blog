<template>
    <div class="bg-green-300 p-2 h-auto w-40 rounded-md">
        <h1 class="w-full pb-3 text-center">{{item.name}}</h1>
        <p class="text-center">{{item.message}}</p>
    </div>
</template>

<script>
    export default {
        props:['item'],
    }
</script>
