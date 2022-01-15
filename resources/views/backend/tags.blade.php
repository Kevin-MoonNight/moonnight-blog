<x-layouts.backend-layout
    title="標籤列表"
>
    <x-search-box
        name="搜尋標籤"
        link="dashboard.tags.index"
    ></x-search-box>

    <div class="overflow-hidden mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-table">

            @if($tags->count() == 0)
                <p class="mt-10 w-full text-xl text-center text-red-500">
                    找不到標籤!
                </p>
            @else
                <x-tags.tags-table
                    :tags="$tags"
                ></x-tags.tags-table>
            @endif

        </div>
    </div>

    <div class="mt-10 w-full h-auto">
        {{$tags->links()}}
    </div>
</x-layouts.backend-layout>
