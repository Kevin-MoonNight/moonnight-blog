<form method="GET" action="{{route($link)}}"
      class="flex justify-center w-full h-12 bg-white rounded-lg border-2 hover:border-indigo-500"
>

    @if(app('request')->has('tag'))
        <input type="hidden"
               id="tag"
               name="tag"
               value="{{app('request')->input('tag')}}"
        />
    @endif
    @if(app('request')->has('author'))
        <input type="hidden"
               id="tag"
               name="tag"
               value="{{app('request')->input('author')}}"
        />
    @endif
    <input type="search"
           id="search"
           name="search"
           value="{{old('search')}}"
           placeholder="{{$name}}"
           title="{{$name}}"
           class="px-5 w-full h-full rounded-lg outline-none"
    >
    <button type="submit"
            class="flex justify-center items-center w-12 text-gray-500 hover:text-black"
    >
        <i class="fas fa-search"></i>
    </button>
</form>
