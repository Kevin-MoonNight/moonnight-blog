<x-layouts.articles-layout
    title="{{$article->title}}"
    description="{{$article->excerpt}}"
>
    <article class="min-h-screen bg-white shadow-md md:rounded-md">
        <div class="p-8 w-full">
            <div class="flex items-center">
                <i class="far fa-calendar"></i>
                <p class="ml-3">
                    {{ $article->author->name . '．' . ($article->created_at) }}
                </p>
            </div>

            <div class="mt-5">
                <h1 class="mb-5 text-4xl">
                    {{ $article->title }}
                </h1>

                <div class="mb-5 h-60">
                    <img src="{{asset($article->thumbnail)}}"
                         class="object-none object-center w-full h-full"
                         alt="圖片無法載入..."
                    >
                </div>

                <h2 class="mb-5 text-xl text-blueGray-500">
                    {{ $article->excerpt }}
                </h2>

                <hr class="my-4 border-blueGray-300"/>

                <h6 class="text-lg">
                    {{$article->content}}
                </h6>
            </div>

            <div class="flex flex-wrap gap-2 mt-20 w-full h-auto">
                @foreach($article->tags as $tag)
                    <a href="{{route('articles.index',['tag'=>$tags->slug])}}"></a>
                    <p class="px-3 py-1 text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:bg-blueGray-300">
                        {{ $tag->name }}
                    </p>
                @endforeach
            </div>

            <div class="flex justify-between mt-10">
                <p class="">
                    {{ $article->views }} views
                </p>
                <a href="{{route('articles.index')}}"
                   class="font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500">
                    回文章列表
                </a>
            </div>
        </div>
    </article>
</x-layouts.articles-layout>
