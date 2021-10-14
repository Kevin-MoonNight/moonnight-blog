<template>
    <footer class="flex justify-end items-end w-full">
        <div class="p-3 w-full h-auto text-gray-200 bg-gray-800">
            <div class="flex flex-col justify-end items-center text-sm md:text-md">
                <a href="https://www.freepik.com">Designed by vectorjuice / Freepik</a>
                <p>Copyright &copy; {{ year }} by {{ name }} All Rights Reserved.</p>
            </div>
        </div>
    </footer>
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
