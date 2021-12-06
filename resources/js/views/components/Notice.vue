<template>
    <div class="p-2 w-40 h-auto rounded-md" :class="color ? 'bg-green-300' : 'bg-red-500'">
        <p class="text-center">{{ message }}</p>
    </div>
</template>

<script>
export default {
    props: ['message', 'color'],
}
</script>
