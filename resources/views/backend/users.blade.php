<x-layouts.backend-layout
    title="使用者列表"
>
    <x-search-box
        name="搜尋使用者"
        link="dashboard.users.index"
    ></x-search-box>

    <div class="overflow-hidden mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-table">

            @if($users->count() == 0)
                <p class="mt-10 w-full text-xl text-center text-red-500">
                    找不到訊息!
                </p>
            @else
                <x-users.users-table
                    :users="$users"
                ></x-users.users-table>
            @endif

        </div>
    </div>

    <div class="mt-10 w-full h-auto">
        {{$users->links()}}
    </div>
</x-layouts.backend-layout>
