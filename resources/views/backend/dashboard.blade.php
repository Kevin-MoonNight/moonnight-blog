<x-layouts.backend-layout
    title="後台"
>
    <div class="grid grid-cols-3 gap-5 w-full h-auto">
        <div class="col-span-1 p-5 bg-white rounded-sm shadow-md">
            <div class="object-contain col-span-1 h-60">
                <img src="{{auth()->user()->profile_photo_url}}"
                     alt="無法顯示圖片"
                     loading="lazy"
                     class="">
            </div>
            <div class="">
                <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                    名稱：{{ auth()->user()->name }}
                </div>
                <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                    帳號：{{ auth()->user()->username }}
                </div>
                <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                    電子信箱：{{ auth()->user()->email }}
                </div>
                <div class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                    權限：
                    <ol class="">
                        @foreach(auth()->user()->roles()->get() as $role)
                            <li class="list-disc list-inside">{{ $role->name }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>

            <div class="flex">
                <a href="{{route('user-profile-information.update')}}">
                    <x-form.button>
                        更新資料
                    </x-form.button>
                </a>
                <a href="{{route('user-password.update')}}">
                    <x-form.button>
                        更新密碼
                    </x-form.button>
                </a>
            </div>
        </div>
    </div>
</x-layouts.backend-layout>
