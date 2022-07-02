<footer class="bg-gray-800">
    <div class="px-8 py-8 mx-auto max-w-screen-xl md:py-16 xl:px-16">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="">
                <h4 class="text-4xl tracking-wide text-white">
                    <strong>慕耐工作室</strong>
                </h4>
                <h5 class="mt-4 mb-2 text-lg tracking-wide text-gray-400">
                    歡迎到來我們其他社群軟體看看，裡面也有很多酷東西!
                </h5>
                <div class="mt-6">
                    <a href="{{env('APP_LINE_URL')}}">
                        <button title="line"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-green-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-line"></i>
                        </button>
                    </a>
                    <a href="{{env('APP_GITHUB_URL')}}">
                        <button title="github"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-gray-800 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-github"></i>
                        </button>
                    </a>
                    <a href="{{env('APP_YOUTUBE_URL')}}">
                        <button title="youtube"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-red-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-youtube"></i>
                        </button>
                    </a>
                </div>
                <div class="mt-6 text-sm text-gray-500">
                    <p>Copyright &copy; {{ date("Y") }} by {{ env('AUTHOR') }} All Rights Reserved.</p>
                </div>
            </div>
            <div class="mt-16 md:mt-0">
                <div class="grid grid-cols-2 gap-5 justify-items-center">
                    <div class="not-italic md:justify-self-end">
                        <h6 class="block font-bold text-gray-300 uppercase text-md">
                            聯絡資訊
                        </h6>
                        <address class="mt-6 space-y-4 not-italic break-words">
                            <p class="text-sm font-semibold text-gray-400 transition duration-200 ease-in-out hover:text-indigo-500">
                                電子信箱：{{ env('APP_EMAIL') }}
                            </p>

                            <p class="text-sm font-semibold text-gray-400 transition duration-200 ease-in-out hover:text-indigo-500">
                                電話：{{ env('APP_PHONE') }}
                            </p>

                            <p class="text-sm font-semibold text-gray-400 transition duration-200 ease-in-out hover:text-indigo-500">
                                地址：{{ env('APP_ADDRESS') }}
                            </p>
                        </address>
                    </div>
                    <div class="">
                        <h6 class="block font-bold text-gray-300 uppercase text-md">
                            所有連結
                        </h6>
                        <ul class="mt-6 space-y-4 font-semibold list-unstyled">
                            <li>
                                <a href="{{route('root','#about')}}" title="關於我們"
                                   class="block text-sm text-gray-400 hover:text-indigo-500">
                                    關於我們
                                </a>
                            </li>
                            <li>
                                <a href="{{route('articles.index')}}" title="文章列表"
                                   class="block text-sm text-gray-400 hover:text-indigo-500">
                                    文章列表
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index')}}" title="專案作品"
                                   class="block text-sm text-gray-400 hover:text-indigo-500">
                                    專案作品
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}" title="聯絡我們"
                                   class="block pb-2 text-sm text-gray-400 hover:text-indigo-500">
                                    聯絡我們
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
