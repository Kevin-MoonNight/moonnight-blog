<x-frontend-layout>

    <div class="flex justify-center min-h-screen">
        <div class="w-full max-w-screen-xl px-10 py-20">

            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-x-5 gap-y-10">
                @foreach ($products as $product)

                    <div class="bg-white shadow-md rounded-lg">
                        <div class="rounded-lg hover:opacity-100 opacity-90">
                            <img class="h-72 w-full rounded-lg" alt="圖片無法載入..." src="{{$product->url}}">
                            <div class="p-4 h-52 overflow-auto">
                                <h1 class="h-1/5 text-2xl ">{{$product->name}}</h1>
                                <p class="h-1/5 py-3 text-2xl text-gray-600"> {!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

    @include('layouts.paginator',['items' => $products])

</x-frontend-layout>
