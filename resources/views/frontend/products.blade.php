<x-layouts.frontend-layout
    title="專案作品"
>
    <section class="pt-5 bg-gray-100 md:py-10">
        <div class="container mx-auto w-full max-w-screen-xl min-h-screen md:px-14">
            <div class="flex flex-wrap content-between px-4 min-h-screen md:px-0">

                @if($products->count()===0)
                    <p class="mt-10 w-full text-xl text-center text-red-500">
                        目前無專案作品!
                    </p>
                @endif

                <div class="grid grid-cols-1 gap-5 place-items-stretch w-full sm:grid-cols-2 lg:grid-cols-3">
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
