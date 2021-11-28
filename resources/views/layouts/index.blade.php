<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="zh-TW">

    <title>慕耐程式工作室 | MoonNight</title>
    <meta name="keywords" content="演算法,專題,論文,網頁設計,軟體設計,外包,程式,慕耐工作室">
    <meta name="description" content="MoonNight 慕耐工作室，題供演算法程式設計、專題程式設計、論文程式設計、桌面軟體設計、客製化網站服務、品牌形象網站設計等服務">
    <meta name="author" content="鄭政文">
    <meta name="copyright" content="鄭政文">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{mix('/images/blogIcon.ico')}}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/240a2f8f32.js" crossorigin="anonymous" defer></script>
    <base href="{{ env('APP_URL','http://127.0.0.1:8000/') }}" target="_self">
</head>
<body class="">
<div id="app">
</div>
</body>
</html>


