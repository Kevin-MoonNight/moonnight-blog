<x-side-box name="熱門文章">
    @foreach($articles as $article)
        <a href="{{route('articles.show',['article'=> $article->slug])}}">
            <p class="px-4 py-1 w-auto text-sm bg-gray-200 rounded-sm transition duration-150 ease-in-out cursor-pointer hover:text-white hover:bg-indigo-500">
                {{ $article->title }}
            </p>
        </a>
    @endforeach
</x-side-box>
