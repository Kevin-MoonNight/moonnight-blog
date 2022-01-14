<x-layout.backend-layout
    title="更新使用者資料"
>
    <form
        method="post"
        action="{{route('dashboard.users.update',['user'=>$user])}}"
        enctype="multipart/form-data"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        @method('PATCH')
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name',$user->name)}}"
            >
                名稱
            </x-form.input>

            <x-form.input
                name="username"
                value="{{old('username',$user->username)}}"
            >
                帳號
            </x-form.input>

            <x-form.input
                name="email"
                value="{{old('email',$user->email)}}"
            >
                電子信箱
            </x-form.input>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>更新使用者資料</x-form.button>
            </div>
        </div>
    </form>
</x-layout.backend-layout>
