<div class="py-4">
    <div class="flex items-center" title="{{$comment->user->name}}">
        <img class="mr-4 w-10 h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}"
             alt="Avatar"
             loading="lazy"
        >
        <div class="text-sm">
            <p class="leading-none text-gray-900">{{ $comment->user->name }}</p>
            <p class="text-gray-600">{{ $comment->created_at }}</p>
        </div>
    </div>

    <div class="ml-14">
        <div class="my-4 leading-normal">
            <p class="text-gray-900">
                {{ $comment->comment }}
            </p>
        </div>
        <div class="flex items-center">
            <label for="comment" wire:click="replyComment"
                   class="font-bold text-gray-600 transition duration-200 delay-75 cursor-pointer hover:text-gray-800"
            >
                回覆
            </label>
        </div>
    </div>
</div>
