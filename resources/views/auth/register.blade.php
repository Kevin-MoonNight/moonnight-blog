<x-layouts.frontend-layout
    title="註冊"
>
    <div class="flex justify-center items-center min-h-screen bg-gray-800">
        <div class="px-4 py-20 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words rounded-lg border-0 shadow-lg bg-gray-200">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-lg font-bold text-gray-500">
                            註冊
                        </h6>
                    </div>

                    <form method="post" action="{{route('register')}}">
                        @csrf
                        <x-form.input
                            name="name"
                            value="{{old('name')}}"
                        >
                            姓名
                        </x-form.input>

                        <x-form.input
                            name="username"
                            value="{{old('username')}}"
                        >
                            帳號
                        </x-form.input>

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
                                註冊
                            </x-form.button>
                        </div>
                    </form>
                    <hr class="mt-6 border-b-1 border-gray-300"/>
                </div>
                <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                    <div class="mb-3 font-bold text-center text-gray-400">
                        <small>或使用其他方法註冊</small>
                    </div>
                    <div class="text-center">
                        <button
                            class="inline-flex items-center px-4 py-2 mr-1 mb-1 text-xs font-normal font-bold uppercase bg-white rounded shadow transition-all duration-150 ease-linear outline-none active:bg-gray-50 text-gray-700 focus:outline-none hover:shadow-md">
                            <img
                                src="{{mix('/images/google.svg')}}"
                                alt="..."
                                class="mr-1 w-5"
                            />
                            Google
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend-layout>
