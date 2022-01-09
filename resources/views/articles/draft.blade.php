<x-layout.backend-layout
    title="草稿"
>
    <x-search-box
        name="搜尋文章"
        link="dashboard.articles.index"
    ></x-search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen">

            @if($articles->count() == 0)
                <p class="mt-10 w-full text-xl text-center text-red-500">
                    找不到文章!
                </p>
            @else
                <x-articles-table
                    :articles="$articles"
                ></x-articles-table>
            @endif

        </div>
    </div>

    <div class="mt-10 w-full h-auto">
        {{$articles->links()}}
    </div>
</x-layout.backend-layout>
