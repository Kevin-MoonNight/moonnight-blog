<x-frontend-layout>
    <div class="flex justify-center min-h-screen">
        <div class="w-full max-w-screen-xl px-10">

            <div class="flex justify-center py-20">
                @include('layouts.search-Input')
            </div>


            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-10">
                @foreach ($articles as $article)
                    <a href="{{route('articles.show',$article)}}" class="">
                        <div class="bg-white mx-auto shadow-md rounded-lg hover:scale-105 hover:shadow-xl transform transition duration-200">
                            <div class="flex space-x-3 items-center p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>

                                <div class="">
                                    {{date_format($article->created_at,'Y-m-d') . "．" . $article->user->name}}
                                </div>
                            </div>

                            <img class="w-full" alt="圖片無法載入..." src="{{$article->url}}">

                            <div class="p-4">
                                <div class="h-48 overflow-hidden">
                                    <h1 class="hover:cursor-pointer font-bold text-2xl break-words">{{$article->title}}</h1>
                                    <p class="hover:cursor-pointer py-3 text-gray-600 "> {!! substr($article->content,0,100) !!} more... </p>
                                </div>

                                <div class="flex items-end">
                                    <div class="h-12 overflow-x-auto">
                                        @foreach ($article->tags as $tag)
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm m-2">#{{$tag->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="flex justify-end">
                                    {{$article->views}} views
                                </p>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    @include('layouts.paginator',['items' => $articles])

</x-frontend-layout>
