<div class="px-4 w-full text-center group"
     title="{{ $description }}"
>
    <div
        class="inline-flex justify-center items-center p-3 w-12 h-12 text-gray-800 bg-white rounded-full transition duration-300 ease-in-out group-hover:text-indigo-500">
        {{ $slot }}
    </div>
    <div class="">
        <h4 class="mt-5 text-xl font-semibold text-gray-600 transition duration-300 ease-in-out group-hover:text-indigo-500">
            {{ $title }}
        </h4>
        <p class="mt-2 mb-4 font-semibold text-gray-400 transition duration-300 ease-in-out group-hover:text-indigo-500">
            {{ $description }}
        </p>
    </div>
</div>
