<nav class="sticky top-0 z-50 h-14 bg-white shadow-md flex justify-center">
    <div class="flex justify-between max-w-screen-xl w-full">
        <div class="flex text-md">
            <a class="py-4 px-4  text-xl" href="{{ route('root') }}">MoonNight</a>
            <a class="hidden md:flex py-4 px-2 group" href="{{ route('root') }}">
                <p class="px-2 border-red-200 group-hover:border-b-4">首頁</p>
            </a>
            <a class="hidden md:flex py-4 px-2 group" href="{{ route('articles.index') }}">
                <p class="px-2 border-red-200 group-hover:border-b-4">文章</p>
            </a>
            <a class="hidden md:flex py-4 px-2 group" href="{{ route('articleTag', ['name'=>'sideproject']) }}">
                <p class="px-2 border-red-200 group-hover:border-b-4">Side project</p>
            </a>
            <a class="hidden md:flex py-4 px-2 group" href="{{ route('products.index') }}">
                <p class="px-2 border-red-200 group-hover:border-b-4">專案作品</p>
            </a>
            <a class="py-4 px-2" href="{{ route('contact.create') }}">
                <p class="animate-bounce">聯絡我們</p>
            </a>

        </div>

        <div class="hidden md:flex text-md">
            @guest
                <a class="hidden md:flex py-4 px-2 group" href="{{route('login')}}">
                    <p class="px-2 border-red-200 group-hover:border-b-4">登入</p>
                </a>
{{--                <a class="hidden md:flex py-4 px-2 group" href="{{route('register')}}">--}}
{{--                    <p class="px-2 border-red-200 group-hover:border-b-4">註冊</p>--}}
{{--                </a>--}}
            @endguest
            @auth()
                <a class="hidden md:flex py-4 px-2 group" href="{{route('dashboard')}}">
                    <p class="px-2 border-red-200 group-hover:border-b-4">後台</p>
                </a>
            @endauth
        </div>
    </div>
</nav>
