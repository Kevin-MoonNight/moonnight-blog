<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="zh-TW">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>演算法程式設計｜MoonNight</title>
        <meta name="description" content="演算法程式外包｜MoonNight">
        <meta name="keywords" content="演算法設計,網頁設計,軟體設計,外包,程式">
        <meta name="author" content="鄭政文">
        <meta name="copyright" content="鄭政文">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('image/cat.png') }}">
        <script src="{{ mix('/js/app.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
              rel="stylesheet">
        <link href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css"
              rel="stylesheet">

    </head>
    <body class="">
        <div id="app">

        </div>
    </body>
</html>


