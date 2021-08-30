@extends('layouts.index')

@section('content')

    <div class="flex justify-center min-h-screen">
        <div class="w-full max-w-screen-xl px-10 py-20">

            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-x-5 gap-y-10">
                @foreach ($products as $product)

                    <div class="bg-white shadow-md rounded-lg">
                        <div class="rounded-lg hover:opacity-100 opacity-90">
                            <img class="h-72 w-full rounded-lg" alt="圖片無法載入..." src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1352&q=80">
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
@endsection
