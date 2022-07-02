<x-layouts.frontend-layout>
    <div class="flex justify-center items-center w-full h-auto bg-gray-100 sm:h-screen">
        <div class="py-10 w-full bg-white rounded-sm sm:w-auto sm:px-40">
            <div class="flex flex-col items-center">
                <h2 class="text-9xl font-bold text-indigo-500">404</h2>

                <h4 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">糟糕!</span> 尋找不到頁面
                </h4>

                <p class="mb-8 text-center text-gray-500 md:text-lg">
                    您尋找的頁面並不存在!
                </p>

                <x-button-primary
                    :link="route('root')"
                >
                    回到首頁
                </x-button-primary>
            </div>
        </div>
    </div>
</x-layouts.frontend-layout>
