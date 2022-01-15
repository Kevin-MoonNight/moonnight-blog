<footer class="pt-8 pb-4 select-none bg-blueGray-800">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap text-center lg:text-left">
            <div class="px-4 w-full lg:w-6/12">
                <h4 class="text-3xl text-white">慕耐工作室</h4>
                <h5 class="mt-4 mb-2 text-lg text-blueGray-400">
                    歡迎到來我們其他社群軟體看看，裡面也有很多酷東西!
                </h5>
                <div class="mt-6 mb-6 lg:mb-0">
                    <a href="{{env('APP_TWITTER_URL')}}">
                        <button title="twitter"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-blue-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-twitter"></i>
                        </button>
                    </a>
                    <a href="{{env('APP_FACEBOOK_URL')}}">
                        <button title="facebook"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-blue-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-facebook-square"></i>
                        </button>
                    </a>
                    <a href="{{env('APP_LINE_URL')}}">
                        <button title="line"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal text-green-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none">
                            <i class="fab fa-line"></i>
                        </button>
                    </a>
                    <a href="{{env('APP_GITHUB_URL')}}">
                        <button title="github"
                                class="justify-center items-center mr-2 w-10 h-10 font-normal bg-white rounded-full shadow-lg outline-none text-blueGray-800 align-center focus:outline-none">
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
            </div>
            <div class="px-4 w-full lg:w-6/12">
                <div class="flex flex-wrap mb-6 items-top">
                    <address class="px-4 ml-auto w-full not-italic lg:w-4/12">
                            <span class="block mb-2 font-bold uppercase text-blueGray-300 text-md">
                                聯絡資訊
                            </span>
                        <ul class="list-unstyled">
                            <li title="{{ env('APP_EMAIL') }}">
                                <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                    電子信箱：{{ env('APP_EMAIL') }}
                                </p>
                            </li>
                            <li title="{{ env('APP_PHONE') }}">
                                <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                    電話：{{ env('APP_PHONE') }}
                                </p>
                            </li>
                            <li title="{{ env('APP_ADDRESS') }}">
                                <p class="block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                                    地址：{{ env('APP_ADDRESS') }}
                                </p>
                            </li>
                        </ul>
                    </address>

                    <div class="px-4 ml-auto w-full lg:w-4/12">
                        <span class="block mb-2 font-bold uppercase text-blueGray-300 text-md">
                            所有連結
                        </span>
                        <ul class="font-semibold list-unstyled">
                            <li>
                                <a href="{{route('root','#about')}}" title="關於我們"
                                   class="block pb-2 text-sm text-blueGray-400 hover:text-indigo-500">
                                    關於我們
                                </a>
                            </li>
                            <li>
                                <a href="{{route('articles.index')}}" title="文章列表"
                                   class="block pb-2 text-sm text-blueGray-400 hover:text-indigo-500">
                                    文章列表
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index')}}" title="專案作品"
                                   class="block pb-2 text-sm text-blueGray-400 hover:text-indigo-500">
                                    專案作品
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}" title="聯絡我們"
                                   class="block pb-2 text-sm text-blueGray-400 hover:text-indigo-500">
                                    聯絡我們
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3 border-blueGray-400"/>
        <div class="flex flex-wrap justify-center items-center md:justify-between">
            <div class="px-4 mx-auto w-full text-center md:w-4/12">
                <div class="py-1 text-sm text-blueGray-500">
                    <a href="https://www.freepik.com">Designed by vectorjuice / Freepik</a>
                    <p>Copyright &copy; {{ date("Y") }} by {{ env('AUTHOR') }} All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
