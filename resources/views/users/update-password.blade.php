<x-layouts.backend-layout
    title="更新密碼"
>
    <form
        method="post"
        action="{{route('user-password.update')}}"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        @method('PUT')
        <div class="p-5">
            <x-form.input
                type="password"
                name="current_password"
            >
                目前密碼
            </x-form.input>

            <x-form.input
                type="password"
                name="password"
            >
                新密碼
            </x-form.input>

            <x-form.input
                type="password"
                name="password_confirmation"
            >
                確認新密碼
            </x-form.input>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>更新密碼</x-form.button>
            </div>
        </div>
    </form>
</x-layouts.backend-layout>
