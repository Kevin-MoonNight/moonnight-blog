<div class="px-5 py-3 mt-4 bg-white rounded-sm shadow-md">
    @guest()
        <p>請先登入才能留言喔!</p>
    @endguest
    @auth()
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <input hidden name="article_id" value="{{$article->id}}">

            <input hidden name="parent_id" value="{{$parentId}}">

            <x-form.textarea
                name="comment"
                value="{{ old('comment') }}"
            >
                @if(isset($replyComment))
                    回覆 {{$replyComment->user->name}}
                @else
                    留言
                @endif
            </x-form.textarea>
            <div class="flex justify-between">
                <p class="mt-2 text-sm text-gray-400 select-none">
                    上限200字
                </p>
                <div class="flex items-center">
                    @isset($replyComment)
                        <p wire:click="cancelReply"
                           class="px-3 py-3 mt-4 mr-3 font-bold text-gray-800 bg-gray-200 rounded transition duration-200 cursor-pointer select-none hover:bg-slate-300"
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
    @endauth
</div>
