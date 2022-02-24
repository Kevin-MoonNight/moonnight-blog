<div class="overflow-hidden w-full max-w-full bg-white rounded-sm shadow-md md:flex">
    <div
        class="flex-none h-48 text-center bg-cover md:h-auto md:w-56"
        style="background-image: url('{{$article->thumbnail}}')"
        title="Thumbnail"
    ></div>

    <div class="flex flex-col justify-between p-4 w-full leading-normal">
        <a href="{{$link}}" class="mb-8 min-h-48" title="{{$article->title}}">
            <div class="mb-2 text-xl font-bold text-gray-900">{{$article->title}}</div>
            <p class="text-base text-gray-700">{{$article->excerpt}}</p>
        </a>

        <div class="flex justify-between items-center">
            <a href="{{route('articles.index',['author'=> $article->author->name])}}"
               class="flex items-center"
               title="{{$article->author->name}}"
            >
                <img class="mr-4 w-10 h-10 rounded-full" src="{{$article->author->profile_photo_url}}"
                     alt="Avatar"
                     loading="lazy"
                >
                <div class="text-sm">
                    <p class="leading-none text-gray-900">{{$article->author->name}}</p>
                    <p class="text-gray-600">{{$fromNow($article->created_at)}}</p>
                </div>
            </a>

            <div class="flex">
                <div class="flex items-center text-gray-700 select-none">
                    <i class="fas fa-eye"></i>
                    <small class="ml-1">
                        {{ $article->views }}
                    </small>
                </div>

                <x-articles.like-button
                    class="ml-3"
                    :article="$article"
                ></x-articles.like-button>
            </div>
        </div>
    </div>
</div>
