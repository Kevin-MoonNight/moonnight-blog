<header class="sticky top-0 z-50 bg-white shadow-lg">
    <nav class="container flex justify-between items-center w-full h-14 rounded-md md:justify-start md:px-14">
        <a href="{{route('root')}}">
            <p class="px-4 text-xl">MoonNight</p>
        </a>

        <ul class="hidden md:flex md:items-center">
            <li>
                <a href="{{route('root')}}">
                    <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                        首頁
                    </p>
                </a>
            </li>
            <li>
                <a href="{{route('articles.index')}}">
                    <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                        文章
                    </p>
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}">
                    <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                        專案作品
                    </p>
                </a>
            </li>
            <li>
                <a href="{{route('contact')}}">
                    <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                        聯絡我們
                    </p>
                </a>
            </li>
            @guest()
                <li>
                    <a href="{{route('login')}}">
                        <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                            登入
                        </p>
                    </a>
                </li>
            @endguest
            @auth()
                <li>
                    <a href="{{route('dashboard')}}">
                        <p class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500">
                            後台
                        </p>
                    </a>
                </li>
                <li>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button
                            type="submit"
                            class="px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500"
                        >
                            登出
                        </button>
                    </form>
                </li>
            @endauth
        </ul>

        <div @click="isOpen = !isOpen" class="px-4 cursor-pointer md:hidden">
            <div v-if="isOpen">
                <i class="fas fa-times"></i>
            </div>
            <div v-else>
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <transition name="list" class="md:hidden">
            <div v-show="isOpen" @click="isOpen=false"
                 class="fixed top-14 w-full h-screen bg-opacity-30 bg-blueGray-700">
                <ul class="w-full text-center bg-white bg-opacity-80">
                    <li>
                        <a href="{{route('root')}}">
                            <p class="py-4 w-full hover:text-indigo-500">
                                首頁
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('articles.index')}}">
                            <p class="py-4 w-full hover:text-indigo-500">
                                文章
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('products.index')}}">
                            <p class="py-4 w-full hover:text-indigo-500">
                                專案作品
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">
                            <p class="py-4 w-full hover:text-indigo-500">
                                聯絡我們
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </transition>
    </nav>
</header>
