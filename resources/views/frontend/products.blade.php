<x-layouts.frontend-layout
    title="專案作品"
>
    <section class="py-10 mt-20 bg-gray-100 lg:mt-30 md:py-20">
        <div class="container mx-auto w-full max-w-screen-xl min-h-screen md:px-8 lg:px-14">
            <div class="flex flex-wrap content-between px-4 min-h-screen md:px-0">
                <div class="grid grid-cols-1 gap-10 place-items-stretch w-full sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($products as $product)
                        <x-products.products-card :product="$product"></x-products.products-card>
                    @endforeach
                </div>

                <div class="mt-10 w-full h-auto">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend-layout>
