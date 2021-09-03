<x-backend-layout>

    <div class="h-screen grid grid-cols-6 grid-rows-4 gap-5 row-span-5">

        <div class="p-5 col-span-1 bg-white rounded-lg shadow-md">
            <div class="flex justify-center">
                <img src="{{Auth::user()->profile_photo_url}}" alt="無法載入圖片..."  class="w-1/2 border border-4 border-black rounded-full">
            </div>

            <div class="flex justify-center mt-5">
                <p class="text-md">
                    {{Auth::user()->name}}
                </p>
            </div>
        </div>

        <div class="p-5 bg-white rounded-lg col-span-5 shadow-md">

            <div class="h-full border">

            </div>

        </div>

        <div class="p-5 bg-white rounded-lg col-span-4 row-span-3 shadow-md">
            <div class="h-full border">

            </div>
        </div>

        <div class="p-5 bg-white rounded-lg col-span-2 row-span-3 shadow-md">
            <div class="h-full border">

            </div>
        </div>
    </div>


</x-backend-layout>

