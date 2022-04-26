<div class="ml-14">
    @if($openReplies)
        <div class=""
             wire:loading.remove
             wire:target="closeReplies"
             wire:click="closeReplies"
        >
            <p class="font-medium text-gray-400 cursor-pointer text-md">
                隱藏回覆
            </p>
        </div>

        @foreach($comment->replies as $reply)
            <div class=""
                 wire:loading.remove
                 wire:target="closeReplies"
            >
                <livewire:articles.comments.comment-card
                    :comment="$reply"
                    wire:key="'comment-card-' . $reply->id"
                />
            </div>

            @if($reply->replies->count() > 0)
                <livewire:articles.comments.comment-reply
                    :comment="$reply"
                    wire:key="'reply-list-' . $reply->id"
                />
            @endif
        @endforeach
    @else
        <div class="pb-4"
             wire:loading.remove
             wire:target="openReplies"
             wire:click="openReplies"
        >
            <p class="font-medium text-gray-400 cursor-pointer text-md">
                查看其他 {{$comment->replies->count()}} 則回覆
            </p>
        </div>
    @endif

    <div class="py-10 w-full"
         wire:loading.delay
         wire:target="openReplies"
    >
        <div class="flex flex-col justify-center items-center">
            <loading-icon></loading-icon>
        </div>
    </div>
</div>
