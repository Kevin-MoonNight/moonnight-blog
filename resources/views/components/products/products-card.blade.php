<div class="rounded-md shadow-md cursor-pointer bg-slate-800 group">
    <div class="object-cover relative h-60 bg-white rounded-t-md">
        <div class="hidden absolute w-full h-full bg-opacity-60 rounded-t-md group-hover:block bg-slate-800">
            <div class="overflow-y-auto w-full h-full">
                <p class="p-4 text-white whitespace-normal">
                    {{ $product->excerpt }}
                </p>
            </div>
        </div>

        <img
            src="{{asset($product->thumbnail)}}"
            loading="lazy"
            alt="{{$product->name}}"
            class="object-none object-center w-full h-full rounded-t-md"
        >
    </div>
    <div class="p-4">
        <p class="text-slate-200">
            {{ $product->name }}
        </p>
    </div>
</div>

