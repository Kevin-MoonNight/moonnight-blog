<side-box name="熱門文章">
    @foreach($articles as $article)
        <a href="{{route('articles.show',['article'=> $article->slug])}}">
            <p class="px-4 py-1 w-auto text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:text-indigo-500 hover:bg-blueGray-300">
                {{ $article->title }}
            </p>
        </a>
    @endforeach
</side-box>
