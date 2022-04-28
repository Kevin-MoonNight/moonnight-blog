<section id="contact" class="bg-gray-100">
    <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">

        <div class="bg-gray-100">
            <div class="mx-6 md:mx-10 lg:mx-20">
                <div
                    class="flex flex-col justify-between items-center px-6 py-8 w-full bg-white rounded-xl sm:py-14 sm:px-12 lg:px-16 sm:flex-row">
                    <div class="flex flex-col">
                        <h5 class="text-xl font-medium leading-relaxed text-black sm:text-2xl lg:text-3xl">
                            對以上的服務有興趣的話 <br/> 聯絡我們!
                        </h5>
                        <p class="mt-4 leading-normal text-gray-600 sm:text-lg lg:text-xl">
                            我們會盡快回覆您!
                        </p>
                    </div>

                    <x-button-primary
                        :link="route('contact')"
                    >
                        聯絡我們
                    </x-button-primary>
                </div>
            </div>
        </div>
    </div>
</section>
