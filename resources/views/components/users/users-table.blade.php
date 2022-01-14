<table class="w-full h-full border-collapse table-auto min-w-lg">
    <thead>
    <tr class="font-light text-blueGray-800">
        <th class="py-2 border">名稱</th>
        <th class="py-2 border">帳號</th>
        <th class="py-2 border">電子信箱</th>
        <th class="py-2 border">權限</th>
        <th class="py-2 border">動作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <x-table.tr>
            <x-table.td>
                {{ $user->name }}
            </x-table.td>

            <x-table.td>
                {{ $user->username }}
            </x-table.td>

            <x-table.td>
                {{ $user->email }}
            </x-table.td>

            <x-table.td>
                {{ $user->is_admin }}
            </x-table.td>

            <x-table.td>
                <div class="flex justify-around items-center">
                    <x-table.action.edit
                        link="{{route('dashboard.users.edit',['user'=>$user])}}"
                    ></x-table.action.edit>

                    <x-table.action.delete
                        link="{{route('dashboard.users.destroy',['user'=>$user])}}"
                    ></x-table.action.delete>
                </div>
            </x-table.td>
        </x-table.tr>
    @endforeach
    </tbody>
</table>
