<table class="w-full h-full border-collapse table-auto min-w-lg">
    <thead>
    <tr class="font-light text-blueGray-800">
        <th class="py-2 border">名稱</th>
        <th class="py-2 border">動作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tags as $tag)
        <x-table.tr>
            <x-table.td>
                {{ $tag->name }}
            </x-table.td>

            <x-table.td>
                <div class="flex justify-around items-center">
                    <x-table.action.edit
                        link="{{route('dashboard.tags.edit',['tag'=>$tag])}}"
                    ></x-table.action.edit>

                    <x-table.action.delete
                        link="{{route('dashboard.tags.destroy',['tag'=>$tag])}}"
                    ></x-table.action.delete>
                </div>
            </x-table.td>
        </x-table.tr>
    @endforeach
    </tbody>
</table>
