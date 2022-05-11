<div id="avatar-selector-app">
    <avatar-selector
        :avatars="{{$avatars->toJson()}}"
        name="{{$name}}"
        default="{{old($name,$default)}}"
    ></avatar-selector>

    @error($name)
    <div class="mt-2 ml-1 text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>
<script src="{{ mix('/js/avatar-selector/avatar-selector.js') }}" defer></script>



