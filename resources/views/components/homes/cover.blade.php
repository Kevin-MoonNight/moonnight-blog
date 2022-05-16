<section class="bg-gray-100">
    <div class="px-8 mx-auto max-w-screen-xl xl:px-16">
        <div class="grid grid-cols-1 gap-8 content-center min-h-screen md:grid-cols-2">
            <div class="flex flex-col justify-center items-start">
                <h1 class="text-3xl font-medium leading-normal text-black lg:text-4xl xl:text-5xl">
                    歡迎來到
                    <strong class="mt-1 text-6xl leading-normal text-black">
                        <cover-title></cover-title>
                    </strong>
                </h1>

                <p class="mt-4 font-semibold leading-normal text-gray-600">
                    我們提供客製化網站設計、演算法程式開發及應用軟體開發等多項服務
                </p>

                <div class="mt-10">
                    <x-button-primary
                        :link="'#services'"
                    >
                        查看服務
                    </x-button-primary>
                </div>
            </div>
            <div class="hidden w-full md:flex">
                <div class="w-full h-full">
                    <img
                        class="rounded-md shadow-2xl"
                        src="{{mix('/images/cover.avif')}}"
                        alt="Cover"
                    >
                </div>
            </div>
        </div>
    </div>
</section>
