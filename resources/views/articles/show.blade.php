<x-frontend-layout>
        <div class="flex justify-center items-center py-10">
            <div class="w-full md:w-4/5 h-full min-h-screen max-w-screen-xl p-10 rounded-xl bg-white shadow-xl">
                <div class="space-y-10">
                    <div class="flex items-center space-x-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>

                        <div class="text-gray-500">{{date_format($article->created_at,'Y-m-d') . "．" . $article->user->name}}</div>
                    </div>


                    <div class="min-h-screen">
                        <div class="text-5xl pb-10 break-words"> {{$article->title}} </div>
                        <div class="text-2xl">{!! $article->content !!}</div>
                    </div>

                    <div class="flex">
                        @foreach ($article->tags as $tag)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm m-2">#{{$tag->name}}</span>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-2">

                        <p class="">{{$article->views}} views</p>

                        <a href="{{route('articles.index')}}" class="flex justify-end hover:text-black text-gray-600">回文章列表</a>

                    </div>


                </div>
            </div>
        </div>
</x-frontend-layout>
