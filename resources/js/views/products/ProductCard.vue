<template>
    <div class="rounded-md shadow-md cursor-pointer bg-blueGray-800 group">
        <div class="object-cover h-60 bg-white rounded-t-md group-hover:opacity-80">
            <img class="object-none object-center w-full h-full rounded-t-md" alt="圖片無法載入..."
                 v-bind:src="product.thumbnail">
        </div>
        <div class="p-4">
            <p class="text-blueGray-200">
                {{ product.name }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product']
}
</script>
