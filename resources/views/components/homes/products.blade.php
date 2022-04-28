<section id="products" class="bg-gray-100">
    <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">

        <div class="text-center">
            <h3 class="text-3xl font-medium leading-normal text-black xl:text-4xl">
                與我們合作的案例
            </h3>
        </div>

        <div class="mx-6 mt-20 md:mx-10 lg:mx-20">
            <div class="flex items-center py-20 select-none">
                <carousel
                    :products="{{$products}}"
                ></carousel>
            </div>
            <div class="flex justify-end mt-10">
                <x-button-primary
                    :link="route('products.index')"
                >
                    查看更多案例
                </x-button-primary>
            </div>
        </div>
    </div>
</section>
