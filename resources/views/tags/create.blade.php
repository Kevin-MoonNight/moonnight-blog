<x-layout.backend-layout
    title="新增標籤"
>
    <form
        method="post"
        action="{{route('dashboard.tags.store')}}"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name')}}"
            >
                標題
            </x-form.input>

            <x-form.input
                name="slug"
                value="{{old('slug')}}"
            >
                slug
            </x-form.input>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>新增標籤</x-form.button>
            </div>
        </div>
    </form>
</x-layout.backend-layout>
