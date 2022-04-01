<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="zh-TW">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta name="author" content="{{env('AUTHOR')}}">
    <meta name="copyright" content="{{env('AUTHOR')}}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{mix('/images/blogIcon.ico')}}">
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/240a2f8f32.js" crossorigin="anonymous" defer></script>
    <base href="{{ env('APP_URL','https://moonnight.me/') }}" target="_self">
</head>
<body>
<div class="flex w-full h-screen">
    <div class="hidden select-none xl:z-50 xl:h-screen xl:w-1/5 xl:block">
        <x-backend.navigation></x-backend.navigation>
    </div>

    <div class="overflow-y-auto p-5 w-full h-full xl:w-4/5 min-w-lg bg-blueGray-700">
        <x-backend.user-navigation></x-backend.user-navigation>
        {{$slot}}
    </div>
</div>
</body>
</html>

