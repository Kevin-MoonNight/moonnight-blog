<x-layout.backend-layout
    title="後台"
>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="grid grid-cols-1 gap-5 p-5 w-full h-full md:grid-cols-4">
            <div class="object-contain col-span-1">
                <img src="{{auth()->user()->profile_photo_url}}"
                     alt="無法顯示圖片"
                     loading="lazy"
                     class="w-full h-auto">
            </div>
            <div class="col-span-1 md:col-span-2">
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
                    權限：{{ auth()->user()->is_admin }}
                </div>
            </div>
            <div class="col-span-1 flex">
                <a href="{{route('dashboard.users.edit',['user'=>auth()->user()])}}">
                    <x-form.button>
                        更新資料
                    </x-form.button>
                </a>
                <a href="{{}}">
                    <x-form.button>
                        更新密碼
                    </x-form.button>
                </a>
            </div>
        </div>
    </div>
</x-layout.backend-layout>
