<div
    class="overflow-hidden w-full max-w-full bg-white rounded-sm transition duration-300 ease-in-out hover:shadow-lg md:flex">
    <div
        class="flex-none h-48 bg-cover md:h-auto md:w-56"
        style="background-image: url('{{$article->thumbnail}}')"
    ></div>

    <div class="flex flex-col justify-between p-4 w-full leading-normal">
        <a href="{{$link}}" class="mb-8 min-h-48" title="{{$article->title}}">
            <h2 class="mb-2 text-xl font-bold text-gray-900 break-words">
                {{$article->title}}
            </h2>
            <p class="text-base text-gray-700 break-words">
                {{$article->excerpt}}
            </p>
        </a>

        <div class="grid grid-cols-2 gap-5 justify-items-stretch">
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
                    <p class="text-gray-600">{{$fromNow($article->created_at)}}</p>
                </div>
            </a>

            <div class="flex justify-end items-center text-gray-700">
                <i class="fas fa-eye"></i>
                <small class="ml-1 break-words select-none">
                    {{ $article->views }}
                </small>

                <div class="ml-3">
                    <livewire:articles.like-button
                        :article="$article"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
