<nav class="flex justify-between px-6 py-3 mb-10 h-16 text-gray-200 rounded-sm shadow-md bg-blueGray-600">
    <button class="h-full xl:hidden">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex items-center h-full">
        <p class="">
            {{ auth()->user()->name }}
        </p>
        <drop-down class="ml-3">
            <img
                src="{{auth()->user()->profile_photo_url}}"
                alt="無法載入圖片"
                class="rounded-full h-10"
            >
            <template v-slot:content>
                <div class="text-gray-900 bg-white rounded-sm overflow-hidden">
                    <div class="whitespace-nowrap hover:bg-blueGray-200 border">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="px-6 py-3">登出</button>
                        </form>
                    </div>
                </div>
            </template>
        </drop-down>
    </div>
</nav>


