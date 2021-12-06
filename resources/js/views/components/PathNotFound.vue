<template>
    <div class="flex justify-center items-center w-full h-auto select-none bg-blueGray-600 sm:h-screen">
        <div class="py-20 w-full rounded-sm shadow-xl sm:w-auto sm:px-40 bg-blueGray-200">
            <div class="flex flex-col items-center">
                <h1 class="text-9xl font-bold text-indigo-500">404</h1>

                <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">糟糕!</span> 尋找不到頁面
                </h6>

                <p class="mb-8 text-center text-gray-500 md:text-lg">
                    您尋找的頁面並不存在!
                </p>

                <button @click="redirectToHome"
                        class="px-6 py-2 text-sm font-bold text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                    回到首頁
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {useRouter} from "vue-router";

export default {
    metaInfo() {
        return {
            title: '尋找不到頁面'
        }
    },
    setup() {
        const router = useRouter();
        const redirectToHome = () => {
            router.push({name: 'home'});
        }

        return {
            redirectToHome
        }
    }
}
</script>
