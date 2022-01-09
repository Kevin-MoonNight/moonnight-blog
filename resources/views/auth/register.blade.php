<x-layout.frontend-layout
    title="註冊"
>
    <div class="flex justify-center items-center min-h-screen bg-blueGray-800">
        <div class="px-4 py-20 w-full md:w-2/3 lg:w-1/3">
            <div
                class="mb-6 w-full break-words rounded-lg border-0 shadow-lg bg-blueGray-200">
                <div class="px-6 py-6 mb-0 rounded-t">
                    <div class="mb-3 text-center">
                        <h6 class="text-lg font-bold text-blueGray-500">
                            註冊
                        </h6>
                    </div>

                    @if ($errors->any())
                        <div class="px-3 mb-4">
                            <ol class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500">{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @endif

                    <form method="post" action="{{route('register')}}">
                        @csrf
                        <div class="w-full">
                            <x-form.label for="name">
                                姓名
                            </x-form.label>
                            <x-form.input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="姓名"
                                value="{{old('name')}}"
                            >
                            </x-form.input>
                        </div>

                        <div class="mt-3 w-full">
                            <x-form.label for="username">
                                帳號
                            </x-form.label>
                            <x-form.input
                                type="text"
                                id="username"
                                name="username"
                                placeholder="帳號"
                                value="{{old('username')}}"
                            >
                            </x-form.input>
                        </div>

                        <div class="mt-3 w-full">
                            <x-form.label for="email">
                                電子信箱
                            </x-form.label>
                            <x-form.input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="電子信箱"
                                value="{{old('email')}}"
                            >
                            </x-form.input>
                        </div>

                        <div class="mt-3 w-full">
                            <x-form.label for="password">密碼</x-form.label>
                            <x-form.input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="密碼"
                            >
                            </x-form.input>
                        </div>
                        <div class="mt-3 w-full">
                            <x-form.label for="password_confirmation">確認密碼</x-form.label>
                            <x-form.input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="確認密碼"
                            >
                            </x-form.input>
                        </div>

                        <div class="mt-6 text-center">
                            <x-form.button>
                                註冊
                            </x-form.button>
                        </div>
                    </form>
                    <hr class="mt-6 border-b-1 border-blueGray-300"/>
                </div>
                <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                    <div class="mb-3 font-bold text-center text-blueGray-400">
                        <small>或使用其他方法註冊</small>
                    </div>
                    <div class="text-center">
                        <button
                            class="inline-flex items-center px-4 py-2 mr-1 mb-1 text-xs font-normal font-bold uppercase bg-white rounded shadow transition-all duration-150 ease-linear outline-none active:bg-blueGray-50 text-blueGray-700 focus:outline-none hover:shadow-md">
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
</x-layout.frontend-layout>
