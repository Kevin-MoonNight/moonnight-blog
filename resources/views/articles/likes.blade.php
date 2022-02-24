<x-layouts.backend-layout
    title="喜歡的文章"
>
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
</x-layouts.backend-layout>
