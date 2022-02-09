<x-layouts.frontend-layout
    title="重設密碼"
>
    <div class="flex justify-center items-center min-h-screen bg-blueGray-800">
        <div class="px-4 py-20 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words rounded-lg border-0 shadow-lg bg-blueGray-200">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-lg font-bold text-blueGray-500">
                            重設密碼
                        </h6>
                    </div>

                    <form method="post" action="{{route('password.update')}}">
                        @csrf

                        <input hidden name="token" value="{{request()->route('token')}}">

                        <x-form.input
                            name="email"
                            value="{{old('email')}}"
                        >
                            電子信箱
                        </x-form.input>

                        <x-form.input
                            type="password"
                            name="password"
                        >
                            密碼
                        </x-form.input>
                        
                        <x-form.input
                            type="password"
                            name="password_confirmation"
                        >
                            確認密碼
                        </x-form.input>

                        <div class="text-center">
                            <x-form.button>
                                重設密碼
                            </x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend-layout>
