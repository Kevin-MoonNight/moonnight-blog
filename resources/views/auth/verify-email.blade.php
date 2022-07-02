<x-layouts.frontend-layout
    title="電子信箱驗證"
>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="px-4 py-20 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words bg-white rounded-lg border-0 shadow-lg">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-lg font-bold text-gray-500">
                            電子信箱驗證
                        </h6>
                    </div>

                    <div class="text-center">
                        @if (session('status') == 'verification-link-sent')
                            <div class="text-lg font-medium text-green-500">
                                新的Email認證連結已經發送到信箱中，請查看!
                            </div>
                        @endif

                        <p class="mt-4">
                            你必須驗證電子信箱才能繼續訪問頁面
                        </p>
                    </div>

                    <form method="post" action="{{route('verification.send')}}">
                        @csrf
                        <div class="text-center">
                            <x-form.button>
                                重新發送Email驗證
                            </x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend-layout>
