<x-layouts.articles-layout
    :title="'所有文章'"
>
    <div class="flex flex-wrap content-between px-4 min-h-screen md:px-0">
        <x-search-box
            name="搜尋文章"
            link="articles.index"
        ></x-search-box>

        @if($articles->count()===0)
            <p class="mt-10 w-full text-xl text-center text-red-500">
                找不到文章!
            </p>
        @endif

        <ul class="mt-10 space-y-10 w-full h-auto">
            @foreach($articles as $article)
                <li>
                    <x-articles.articles-card
                        link="{{route('articles.show',['article'=>$article->slug])}}"
                        :article="$article"
                    ></x-articles.articles-card>
                </li>
            @endforeach
        </ul>

        <div class="mt-10 w-full h-auto">
            {{$articles->links()}}
        </div>
    </div>
</x-layouts.articles-layout>
