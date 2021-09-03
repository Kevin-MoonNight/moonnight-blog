<div class="min-h-screen bg-gray-800 text-gray-100 group absolute">

    <div class="h-full py-16">

        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="{{route('dashboard')}}">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>

                <p class="hidden group-hover:flex px-3">首頁</p>

            </div>
        </a>


        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="{{route('articleControl')}}">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>

                <p class="hidden group-hover:flex px-3">文章管理</p>

            </div>
        </a>


        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="{{route('articles.create')}}">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4v16m8-8H4" />
                </svg>

                <p class="hidden group-hover:flex px-3">新增文章</p>

            </div>
        </a>


        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="{{route('messageControl')}}">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>

                <p class="hidden group-hover:flex px-3">訊息管理</p>

            </div>
        </a>


        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>

                <p class="hidden group-hover:flex px-3">會員管理</p>

            </div>
        </a>



        <a class="h-16 hidden md:flex hover:border-l-4 hover:border-purple-500 hover:text-purple-500" href="{{route('root')}}">
            <div class="flex items-center w-full px-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                </svg>

                <p class="hidden group-hover:flex px-3">返回</p>

            </div>
        </a>


    </div>

</div>
