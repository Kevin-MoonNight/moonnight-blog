<form
    method="post"
    action="{{route('user-profile-information.update')}}"
    class="w-full h-auto bg-white rounded-sm shadow-md"
>
    @csrf
    @method('PUT')
    <div class="p-5">
        <x-form.avatars-selector
            name="avatar"
            value="{{auth()->user()->profile_photo_url}}"
        >
            頭像
        </x-form.avatars-selector>
        <x-form.input
            name="name"
            value="{{old('name',$user->name)}}"
        >
            名稱
        </x-form.input>

        <x-form.input
            name="email"
            value="{{old('email',$user->email)}}"
        >
            電子信箱
        </x-form.input>

        <div class="flex justify-end items-end mt-4 w-full">
            <x-form.button>更新個人資料</x-form.button>
        </div>
    </div>
</form>
