<x-layouts.backend-layout
    title="更新標籤"
>
    <form
        method="post"
        action="{{route('dashboard.tags.update',['tag'=>$tag->slug])}}"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        @method('PATCH')
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name',$tag->name)}}"
            >
                名稱
            </x-form.input>

            <x-form.input
                name="slug"
                value="{{old('slug',$tag->slug)}}"
            >
                slug
            </x-form.input>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>更新標籤</x-form.button>
            </div>
        </div>
    </form>
</x-layouts.backend-layout>
