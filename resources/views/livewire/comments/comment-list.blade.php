<div class="">
    @if($article->comments->isEmpty())
        <div class="py-10 px-5 mt-4 bg-white rounded-sm shadow-md">
            <p class="text-lg text-gray-900 text-center font-bold">
                目前沒有留言喔!
            </p>
        </div>
    @else
        <div class="">
            @foreach($article->comments as $comment)
                @empty($comment->parent_id)
                    <livewire:comments.comment-card
                        :comment="$comment"
                        wire:key="'comment-card-' . $comment->id"
                    />
                @endempty
            @endforeach
        </div>
    @endif

    <livewire:comments.comment-box
        :article="$article"
    />
</div>
