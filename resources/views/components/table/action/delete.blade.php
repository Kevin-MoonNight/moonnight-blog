<form
    method="post"
    action="{{$link}}"
>
    @csrf
    @method('DELETE')
    <button class="text-black cursor-pointer hover:text-indigo-500" title="刪除">
        <i class="far fa-trash-alt"></i>
    </button>
</form>
