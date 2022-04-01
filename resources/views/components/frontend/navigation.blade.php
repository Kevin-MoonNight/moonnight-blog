<div id="nav-app" class="">
    <navigation>
        <template v-slot:main>
            <link-scroll
                link="{{route('root')}}"
                current-Link="{{$currentLink}}"
            >
                首頁
            </link-scroll>
            <link-scroll
                link="{{route('articles.index')}}"
                current-Link="{{$currentLink}}"
            >
                文章
            </link-scroll>
            <link-scroll
                link="{{route('products.index')}}"
                current-Link="{{$currentLink}}"
            >
                專案作品
            </link-scroll>
            <link-scroll
                link="{{route('contact')}}"
                current-Link="{{$currentLink}}"
            >
                聯絡我們
            </link-scroll>
        </template>

        <template v-slot:side>
            @guest()
                <a href="{{route('login')}}"
                   class="mx-2 font-semibold tracking-wide text-gray-600 transition-all sm:mx-4 hover:text-indigo-500">
                    登入
                </a>

                <a href="{{route('register')}}">
                    <button
                        class="px-5 py-2 font-semibold tracking-wide text-indigo-500 bg-white rounded-r-full rounded-l-full border border-indigo-500 transition-all outline-none sm:px-8 hover:bg-indigo-500 hover:text-white hover:shadow-indigo">
                        註冊
                    </button>
                </a>
            @endguest
            @auth()
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button
                        type="submit"
                        class="mx-2 font-semibold tracking-wide text-gray-600 capitalize transition-all sm:mx-4 hover:text-indigo-500">
                        登出
                    </button>
                </form>
            @endauth
        </template>

        <template v-slot:mobile>
            <link-scroll-mobile
                link="{{route('root')}}"
                current-Link="{{$currentLink}}"
            >
                首頁
            </link-scroll-mobile>
            <link-scroll-mobile
                link="{{route('articles.index')}}"
                current-Link="{{$currentLink}}"
            >
                文章
            </link-scroll-mobile>
            <link-scroll-mobile
                link="{{route('products.index')}}"
                current-Link="{{$currentLink}}"
            >
                專案作品
            </link-scroll-mobile>
            <link-scroll-mobile
                link="{{route('contact')}}"
                current-Link="{{$currentLink}}"
            >
                聯絡我們
            </link-scroll-mobile>
        </template>
    </navigation>
</div>
<script src="{{ mix('/js/nav/nav.js') }}" defer></script>
