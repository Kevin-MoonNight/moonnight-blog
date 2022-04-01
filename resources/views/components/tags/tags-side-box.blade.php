<side-box name="所有標籤">
    @foreach($tags as $tag)
        <a href="{{route('articles.index',['tag' => $tag->slug])}}">
            <p class="px-4 py-1 w-auto text-sm rounded-sm cursor-pointer bg-gray-200 hover:text-indigo-500 hover:bg-gray-300">
                {{ $tag->name }}
            </p>
        </a>
    @endforeach
</side-box>
