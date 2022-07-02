<div>
    @guest()
        <div class="my-10 mt-8">
            <p class="text-lg font-semibold text-center text-gray-600">
                請先登入才能留言喔!
            </p>
        </div>
    @endguest
    @auth()
        <div class="py-10 w-full"
             wire:loading.delay
             wire:target="setReplyCommentId"
        >
            <div class="flex flex-col justify-center items-center">
                <loading-icon></loading-icon>
            </div>
        </div>
        <div class="mt-8"
             wire:loading.remove
             wire:target="setReplyCommentId"
        >
            <form action="{{route('comments.store')}}" method="post">
                @csrf
                <input hidden name="article_id" value="{{$article->id}}">

                <input hidden name="parent_id" value="{{$replyComment ? $replyComment->id : null}}">

                <x-form.textarea
                    name="comment"
                    value="{{ old('comment') }}"
                >
                    @isset($replyComment)
                        回覆 {{$replyComment->user->name}}
                    @else
                        留言
                    @endisset
                </x-form.textarea>

                <div class="flex justify-between">
                    <p class="mt-2 text-sm text-gray-400 select-none">
                        上限200字
                    </p>
                    <div class="flex">
                        @isset($replyComment)
                            <p class="px-6 py-3 mt-8 font-semibold text-gray-400 transition duration-200 cursor-pointer select-none hover:text-gray-800"
                               wire:click="cancelReply"
                            >
                                取消回覆
                            </p>
                        @endisset
                        <x-form.button>
                            發表
                        </x-form.button>
                    </div>
                </div>
            </form>
        </div>
    @endauth
</div>
