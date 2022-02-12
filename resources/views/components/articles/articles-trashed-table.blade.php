<table class="w-full h-full border-collapse table-auto min-w-lg">
    <thead>
    <tr class="font-light text-blueGray-800">
        <th class="py-2">標題</th>
        <th class="py-2 border-l">觀看數</th>
        <th class="py-2 border-l">時間</th>
        <th class="py-2 border-l">作者</th>
        <th class="py-2 border-l">動作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <x-table.tr>
            <x-table.td>
                {{ $article->title }}
            </x-table.td>

            <x-table.td>
                {{ $article->views }}

            </x-table.td>

            <x-table.td>
                {{ $article->created_at }}
            </x-table.td>

            <x-table.td>
                {{ $article->author->name }}

            </x-table.td>

            <x-table.td>
                <div class="flex justify-around items-center">
                    <x-table.action.restore
                        link="{{route('dashboard.articles.restore',['trashed_article'=>$article->slug])}}"
                    ></x-table.action.restore>

                    <x-table.action.delete
                        link="{{route('dashboard.articles.force-delete',['trashed_article'=>$article->slug])}}"
                    ></x-table.action.delete>
                </div>
            </x-table.td>
        </x-table.tr>
    @endforeach
    </tbody>
</table>
