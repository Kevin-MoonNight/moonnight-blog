<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="zh-TW">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>後台控制｜MoonNight</title>
    <meta name="discription" content="演算法程式設計｜MoonNight">
    <meta name="keywords" content="演算法,外包,網頁,MoonNight,程式">
    <meta name="author" content="MoonNight">
    <meta name="copyright" content="MoonNight">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('image/cat.png') }}">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="">

    <div class="flex justify-center">
        <div class="h-screen w-full">
            <div class="flex h-full">
                <div class="w-full max-w-xs h-full bg-gray-900 text-gray-100">

                    <div class="px-5 space-y-5">
                        <div class="flex text-md justify-center">
                            <a class="py-4 px-4 text-2xl" href="/">MoonNight</a>
                        </div>
                        <div class="">
                          使用者:{{Auth::user()->name}}
                        </div>
                        <a class="hidden md:flex py-4 px-2 hover:bg-gray-500 rounded-xl" href="{{route('dashboard')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <p class="px-2">首頁</p>
                        </a>

                        <a class="hidden md:flex py-4 px-2 hover:bg-gray-500 rounded-xl" href="{{route('articleControl')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <p class="px-2">文章</p>
                        </a>

                        <a class="hidden md:flex py-4 px-2 hover:bg-gray-500 rounded-xl items-center" href="{{route('message.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <span class="px-2">客戶訊息</span>
                        </a>

                        <a class="hidden md:flex py-4 px-2 hover:bg-gray-500 rounded-xl" href="{{route('articles.create')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4v16m8-8H4" />
                            </svg>
                            <p class="px-2 ">新增文章</p>
                        </a>
                    </div>

                </div>

                <div class="w-full bg-gray-200">
                    <nav class="flex justify-center sticky top-0 z-50 h-16 bg-white shadow-md">
                        <div class="flex h-full w-full max-w-screen-xl border">
                            <p class="text-2xl">後台系統</p>



                        </div>
                    </nav>
                    @if(session()->has('notice'))
                        <div class="bg-green-400 text-center">
                            {{session()->get('notice')}}
                        </div>
                    @endif


                    @yield('content')
                </div>

            </div>

        </div>
    </div>

    @include('layouts.footer')



</body>
</html>
