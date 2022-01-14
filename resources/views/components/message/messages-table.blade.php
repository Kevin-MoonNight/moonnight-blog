<table class="w-full h-full border-collapse table-auto min-w-lg">
    <thead>
    <tr class="font-light text-blueGray-800">
        <th class="py-2 border">名稱</th>
        <th class="py-2 border">電子信箱</th>
        <th class="py-2 border">訊息</th>
        <th class="py-2 border">類型</th>
        <th class="py-2 border">時間</th>
        <th class="py-2 border">動作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($messages as $message)
        <x-table.tr>
            <x-table.td>
                {{ $message->name }}
            </x-table.td>

            <x-table.td>
                {{ $message->email }}
            </x-table.td>

            <x-table.td>
                {{ $message->remark }}
            </x-table.td>

            <x-table.td>
                {{ $message->caseType }}
            </x-table.td>

            <x-table.td>
                {{ $message->created_at }}
            </x-table.td>

            <x-table.td>
                <div class="flex justify-around items-center">
                    <x-table.action.edit
                        link="{{route('dashboard.messages.edit',['message'=>$message])}}"
                    ></x-table.action.edit>

                    <x-table.action.delete
                        link="{{route('dashboard.messages.destroy',['message'=>$message])}}"
                    ></x-table.action.delete>
                </div>
            </x-table.td>
        </x-table.tr>
    @endforeach
    </tbody>
</table>
