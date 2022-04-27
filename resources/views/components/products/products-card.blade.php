<div class="overflow-hidden bg-white rounded-sm transition duration-300 ease-in-out group hover:shadow-md">
    <div class="overflow-hidden">
        <div
            class="bg-cover transition duration-300 ease-in-out min-h-48 group-hover:scale-125"
            style="background-image: url('{{ $product->thumbnail }}')"
        ></div>
    </div>

    <div class="p-4 bg-white">
        <h5 class="text-lg font-semibold tracking-wide leading-relaxed text-gray-600">
            {{ $product->name }}
        </h5>
        <p class="mt-3 tracking-wide leading-relaxed text-gray-400">
            {{ $product->excerpt }}
        </p>
    </div>
</div>

