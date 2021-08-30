<div class="flex justify-center p-2 bg-white mt-20">
    <div class="grid grid-cols-3 max-w-screen-xl w-full">

        <p class="flex justify-start">
            {{$items->firstItem()}} - {{$items->lastItem()}} of {{$items->total()}}
        </p>

        <div class="flex justify-between">
            <a href="{{$items->previousPageUrl()}}" class=" text-gray-400 transform duration-200 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </a>

            <a href="{{$items->nextPageUrl()}}" class="text-gray-400 transform duration-200 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
        </div>


        <p class="flex justify-end transform duration-200 hover:text-gray-900">
            {{$items->currentPage()}}
        </p>
    </div>
</div>
