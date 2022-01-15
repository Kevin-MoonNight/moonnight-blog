<x-layouts.backend-layout
    title="新增作品"
>
    <form
        method="post"
        action="{{route('dashboard.products.store')}}"
        enctype="multipart/form-data"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name')}}"
            >
                名稱
            </x-form.input>

            <x-form.input
                name="excerpt"
                value="{{old('excerpt')}}"
            >
                摘要
            </x-form.input>

            <x-form.file-selector
                name="thumbnail"
            >
                縮圖
            </x-form.file-selector>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>新增作品</x-form.button>
            </div>
        </div>
    </form>
</x-layouts.backend-layout>
