<x-layouts.backend-layout
    title="更新作品"
>
    <form
        method="post"
        action="{{route('dashboard.products.update',['product'=>$product])}}"
        enctype="multipart/form-data"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        @method('PATCH')
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name',$product->name)}}"
            >
                名稱
            </x-form.input>

            <x-form.input
                name="excerpt"
                value="{{old('excerpt',$product->excerpt)}}"
            >
                摘要
            </x-form.input>

            <div class="flex">
                <x-form.file-selector
                    name="thumbnail"
                >
                    縮圖
                </x-form.file-selector>

                <img
                    src="{{asset($product->thumbnail)}}"
                    alt="縮圖"
                    class="ml-4 h-24"
                >
            </div>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>更新作品</x-form.button>
            </div>
        </div>
    </form>
</x-layouts.backend-layout>
