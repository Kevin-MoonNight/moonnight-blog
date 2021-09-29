<template>
    <div class="h-56 bg-gray-800 text-gray-200 py-2 text-md">
        <span class="flex items-end justify-center h-full">Copyright &copy; {{ year }} by {{ name }} All Rights Reserved.</span>
    </div>
</template>

<script>
    export default {
        data (){
            return {
                name:'鄭政文',
                year: new Date().getFullYear()
            }
        }
    }
</script>
