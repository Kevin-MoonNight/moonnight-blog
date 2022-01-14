<x-layout.backend-layout
    title="訊息列表"
>
    <x-search-box
        name="搜尋訊息"
        link="dashboard.messages.index"
    ></x-search-box>

    <div class="overflow-hidden mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-table">

            @if($messages->count() == 0)
                <p class="mt-10 w-full text-xl text-center text-red-500">
                    找不到訊息!
                </p>
            @else
                <x-message.messages-table
                    :messages="$messages"
                ></x-message.messages-table>
            @endif

        </div>
    </div>

    <div class="mt-10 w-full h-auto">
        {{$messages->links()}}
    </div>
</x-layout.backend-layout>
