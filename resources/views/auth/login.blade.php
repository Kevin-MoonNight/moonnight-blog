<x-layouts.frontend-layout
    title="登入"
>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="px-4 py-20 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words rounded-lg border-0 shadow-lg bg-white">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-lg font-bold text-gray-500">
                            登入
                        </h6>
                    </div>

                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <x-form.input
                            name="username"
                            value="{{old('username')}}"
                        >
                            帳號
                        </x-form.input>

                        <x-form.input
                            type="password"
                            name="password"
                        >
                            密碼
                        </x-form.input>

                        <div class="mt-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input
                                    id="remember"
                                    name="remember"
                                    type="checkbox"
                                    class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox"
                                />
                                <span class="ml-2 text-sm font-semibold text-gray-600">
                                    記得我
                                </span>
                            </label>
                        </div>

                        <div class="text-center">
                            <x-form.button>
                                登入
                            </x-form.button>
                        </div>
                    </form>

                    <hr class="mt-6 border-b-1 border-gray-400"/>
                </div>
                <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                    <div class="mb-3 font-bold text-center text-gray-500">
                        <small>或使用其他方法登入</small>
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
            <div class="flex flex-wrap mt-6">
                <div class="w-1/2">
                    <a href="{{route('password.request')}}" class="text-gray-600">
                        <small>忘記密碼?</small>
                    </a>
                </div>
                <div class="w-1/2 text-right">
                    <a href="{{route('register')}}" class="text-gray-600">
                        <small>建立新帳號</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend-layout>
