@inject('carbon','Illuminate\Support\Carbon')

<x-layouts.articles-layout
    :title="$article->title"
    :description="$article->excerpt"
>
    <article class="min-h-screen bg-white md:rounded-sm">
        <div class="p-8 w-full">
            <a href="{{route('articles.index',['author'=> $article->author->name])}}"
               class="flex items-center"
               title="{{$article->author->name}}"
            >
                <img class="mr-4 w-10 h-10 rounded-full" src="{{$article->author->profile_photo_url}}"
                     alt="Avatar"
                     loading="lazy"
                >
                <div class="text-sm break-words">
                    <p class="leading-none text-gray-900">{{$article->author->name}}</p>
                    <p class="text-gray-600">{{ $carbon->parse($article->created_at)->toFormattedDateString() }}</p>
                </div>
            </a>

            <div class="mt-5">
                <h1 class="text-4xl font-bold text-gray-900 break-words">
                    {{ $article->title }}
                </h1>

                <div class="mt-10">
                    <img src="{{asset($article->thumbnail)}}"
                         class="w-full"
                         alt="Thumbnail"
                    >
                </div>

                <h2 class="mx-10 mt-10 text-2xl text-gray-700 break-words">
                    {{ $article->excerpt }}
                </h2>

                <hr class="my-5 border-slate-300"/>

                <div id="markdown-preview">
                    <preview-markdown
                        text="{{$article->content}}"
                    ></preview-markdown>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 mt-20">
                @foreach($article->tags as $tag)
                    <a href="{{route('articles.index',['tag'=>$tag->slug])}}">
                        <p class="px-4 py-1 w-auto text-sm bg-gray-200 rounded-sm transition duration-100 ease-in-out cursor-pointer hover:text-white hover:bg-indigo-500">
                            {{ $tag->name }}
                        </p>
                    </a>
                @endforeach
            </div>

            <div class="flex justify-between mt-10">
                <div class="flex items-center text-gray-700 select-none">
                    <i class="fas fa-eye"></i>
                    <small class="ml-1">
                        {{ $article->views }}
                    </small>
                </div>

                <livewire:articles.like-button
                    :article="$article"
                />
            </div>
        </div>
    </article>

    <livewire:articles.comments.comment-list
        :article="$article"
    />
</x-layouts.articles-layout>
<script src="{{ mix('/js/markdown-preview/markdown-preview.js') }}" defer></script>
