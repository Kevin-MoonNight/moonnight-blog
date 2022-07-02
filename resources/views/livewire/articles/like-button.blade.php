<div
    wire:loading.remove
    wire:click="buttonClick"
    wire:target="buttonClick"
    class="flex items-center cursor-pointer select-none transition delay-100 duration-300 ease-in-out
        {{$isLiked ? 'text-red-400 hover:text-gray-700' : 'text-gray-700 hover:text-red-400'}}"
    title="{{$isLiked ? 'Unlike' : 'Like'}}"
>
    <i class="fas fa-heart"></i>
    <small class="ml-1">{{ $count }}</small>
</div>
