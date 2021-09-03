<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="zh-TW">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>演算法程式設計｜MoonNight</title>
    <meta name="discription" content="演算法程式設計｜MoonNight">
    <meta name="keywords" content="演算法,外包,網頁,MoonNight,程式">
    <meta name="author" content="MoonNight">
    <meta name="copyright" content="MoonNight">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('image/cat.png') }}">

</head>
<body class="">

    @include('layouts.nav')

    @if(session()->has('notice'))
        <div class="bg-green-400 text-center">
            {{session()->get('notice')}}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-400 text-center">
            {{session()->get('error')}}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-400 text-center">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach

        </div>
    @endif

    <main>
        {{ $slot }}
    </main>

    @include('layouts.footer')
</body>
</html>
<script src="{{asset('/js/app.js')}}"></script>

