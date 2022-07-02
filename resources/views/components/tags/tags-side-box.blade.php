<x-side-box name="所有標籤">
    @foreach($tags as $tag)
        <a href="{{route('articles.index',['tag' => $tag->slug])}}">
            <p class="px-4 py-1 w-auto text-sm bg-gray-200 rounded-sm transition duration-100 ease-in-out cursor-pointer hover:text-white hover:bg-indigo-500">
                {{ $tag->name }}
            </p>
        </a>
    @endforeach
</x-side-box>
