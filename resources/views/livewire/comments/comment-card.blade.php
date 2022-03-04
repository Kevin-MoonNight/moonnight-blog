<div>
    <div class="p-5 mt-4 bg-white rounded-sm shadow-md">
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

        <div class="mx-10">
            <div class="">
                <p class="mt-4 text-gray-900 min-h-24">
                    {{ $comment->comment }}
                </p>
            </div>

            <div class="mt-5">
                <div class="flex justify-end">
                    <div class="flex items-center">
                        <label for="comment" wire:click="replyComment"
                           class="font-bold text-gray-600 transition duration-200 delay-75 cursor-pointer hover:text-gray-800"
                        >
                            回覆
                        </label>

                        <div wire:click="clickReplies"
                             class="ml-3 text-gray-600 cursor-pointer hover:text-gray-800 transition delay-75 duration-200"
                        >
                            <i class="fas fa-comment"></i>
                            <small class="ml-1">{{ $comment->replies->count() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:loading wire:target="clickReplies" class="py-10 w-full">
        <div class="flex flex-col justify-center items-center">
            <loading-icon></loading-icon>
            <p class="mt-2 font-bold text-gray-600">
                留言載入中...
            </p>
        </div>
    </div>

    @if($openReplies)
        @isset($comment->replies)
            <div class="pl-6">
                @foreach($comment->replies->all() as $reply)
                    <livewire:comments.comment-card
                        :comment="$reply"
                        wire:key="'comment-card-' . $comment->id . '-replies-'. $reply->id"
                    />
                @endforeach
            </div>
        @endisset
    @endif
</div>
