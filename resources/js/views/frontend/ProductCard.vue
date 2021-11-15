<template>
    <div class="bg-white shadow-md">
        <img class="w-full" alt="圖片無法載入..." v-bind:src="product.url">
        <div class="p-4">
            <div class="overflow-hidden">
                <p class="font-bold text-2xl break-words">{{product.title}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['product']
    }
</script>
