<fieldset class="p-3 border-2 border-gray-300 border-solid">
    <legend class="block ml-1 font-bold text-left uppercase text-md text-blueGray-600">{{$slot}}</legend>
    <avatars-selector
        :avatars="{{$avatars->toJson()}}"
        name="{{$name}}"
        default="{{old($name,$value)}}"
    ></avatars-selector>

    @error($name)
    <div class="mt-2 ml-1 text-sm text-red-500">{{ $message }}</div>
    @enderror
</fieldset>



