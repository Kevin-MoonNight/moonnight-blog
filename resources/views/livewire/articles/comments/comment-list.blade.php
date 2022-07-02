<div class="px-8 py-10 md:px-0">
    <div class="">
        <p class="text-lg font-semibold text-gray-600">
            {{$article->comments->count()}} 則留言
        </p>
        <hr class="mt-1 text-gray-800">
    </div>

    @foreach($article->comments as $comment)
        @if($comment->parent_id === null)
            <livewire:articles.comments.comment-card
                :comment="$comment"
                wire:key="'comment-card-' . $comment->id"
            />

            @if($comment->replies->count() > 0)
                <livewire:articles.comments.comment-reply
                    :comment="$comment"
                    wire:key="'reply-list-' . $comment->id"
                />
            @endif

            <hr class="text-gray-800">
        @endif
    @endforeach

    <livewire:articles.comments.comment-box
        :article="$article"
    />
</div>
