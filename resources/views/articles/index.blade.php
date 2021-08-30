@extends('layouts.index')

@section('content')

    <div class="flex justify-center min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 w-full max-w-screen-xl">
            @foreach ($articles as $article)
                <a href="{{route('articles.show',$article)}}" class="">
                    <div class="bg-gray-100 my-20">
                        <div class="bg-white mx-auto shadow-xl rounded-lg hover:scale-105 hover:shadow-xl transform transition duration-200">
                            <div class="py-4 px-8">

                                <div class="flex space-x-3 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>

                                    <div class="text-gray-500">{{date_format($article->created_at,'Y-m-d') . "．" . $article->user->name}}</div>
                                </div>

                                <div class="py-4 h-96 overflow-hidden">
                                    <h1 class="hover:cursor-pointer font-bold text-2xl break-words">{{$article->title}}</h1>
                                    <p class="hover:cursor-pointer py-3 text-gray-600 "> {!! $article->content !!}</p>
                                </div>

                                <div class="flex items-end mt-5">
                                    <div class="h-12 overflow-x-auto">
                                        @foreach ($article->tags as $tag)
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm m-2">#{{$tag->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <p>
                                    {{$article->views}} views
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('layouts.paginator',['items' => $articles])

@endsection
