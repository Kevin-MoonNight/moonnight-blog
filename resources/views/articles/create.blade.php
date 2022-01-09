<x-layout.backend-layout
    title="新增文章"
>
    <form
        method="post"
        action="{{route('dashboard.articles.store')}}"
        enctype="multipart/form-data"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        <div class="p-5">
            <x-form.input
                name="title"
                value="{{old('title')}}"
            >
                標題
            </x-form.input>

            <x-form.input
                name="slug"
                value="{{old('slug')}}"
            >
                slug
            </x-form.input>

            <x-form.file-selector
                name="thumbnail"
            >
                縮圖
            </x-form.file-selector>

            <x-form.input
                name="excerpt"
                value="{{old('excerpt')}}"
            >
                摘要
            </x-form.input>

            <div class="mt-4 w-full">
                <x-form.textarea
                    name="content"
                    rows="10"
                    cols="80"
                    value="{{old('content')}}"
                >
                    內容
                </x-form.textarea>
            </div>

            <x-form.select
                name="tags"
                multiple
            >
                標籤
                <x-slot name="options">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-form.select>

            <div class="flex justify-between items-end mt-4 w-full">
                <x-form.select
                    name="state"
                    value="{{old('state',0)}}"
                >
                    狀態
                    <x-slot name="options">
                        <option value="1">發布</option>
                        <option value="0">草稿</option>
                    </x-slot>
                </x-form.select>

                <x-form.button>新增文章</x-form.button>
            </div>
        </div>
    </form>
</x-layout.backend-layout>
