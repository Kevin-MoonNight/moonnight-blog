<div>
    <fieldset class="p-3 border-2 border-gray-300 border-solid">
        <legend class="block ml-1 font-bold text-left uppercase text-md text-blueGray-600">個人資料</legend>

        <div class="flex justify-center w-full">
            <img src="{{$profile_photo_url}}"
                 alt="頭像"
                 class="object-contain h-60"
            >
        </div>

        <div class="mt-5">
            <p class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                名稱：{{ $name }}
            </p>
            <p class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                帳號：{{ $username }}
            </p>
            <p class="block mb-2 ml-1 font-bold text-left text-blueGray-600">
                電子信箱：{{ $email }}
            </p>
        </div>

        <div class="flex justify-end mt-5">
            <a href="{{route('user-profile-information.update')}}">
                <x-form.button>
                    變更個人資料
                </x-form.button>
            </a>
            <a href="{{route('user-password.update')}}">
                <x-form.button>
                    變更密碼
                </x-form.button>
            </a>
        </div>
    </fieldset>
</div>
