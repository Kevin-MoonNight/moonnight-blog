<table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
    <thead>
    <tr class="font-light rounded-t-md border-b text-blueGray-800">
        <th class="py-2 border-r">標題</th>
        <th class="py-2 border-r">觀看數</th>
        <th class="py-2 border-r">時間</th>
        <th class="py-2 border-r">作者</th>
        <th class="py-2">動作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr class="h-14 border-b group hover:bg-blueGray-200">
            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ $article->title }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ $article->views }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ $article->created_at }}
            </td>

            <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                {{ $article->author->name }}
            </td>

            <td class="flex justify-around items-center px-2 h-14 text-center min-w-32">
                <a href="{{route('dashboard.articles.edit',['article'=>$article->slug])}}"
                   class="hover:text-indigo-500"
                   title="編輯文章"
                >
                    <i class="far fa-edit"></i>
                </a>

                <form
                    method="post"
                    action="{{route('dashboard.articles.destroy',['article'=>$article->slug])}}"
                >
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer hover:text-indigo-500" title="丟到垃圾桶">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
