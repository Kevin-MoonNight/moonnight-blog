<x-layout.backend-layout
    title="作品列表"
>
    <x-search-box
        name="搜尋作品"
        link="dashboard.products.index"
    ></x-search-box>

    <div class="overflow-hidden mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-table">

            @if($products->count() == 0)
                <p class="mt-10 w-full text-xl text-center text-red-500">
                    找不到作品!
                </p>
            @else
                <x-products.products-table
                    :products="$products"
                ></x-products.products-table>
            @endif

        </div>
    </div>

    <div class="mt-10 w-full h-auto">
        {{$products->links()}}
    </div>
</x-layout.backend-layout>
