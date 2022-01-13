<div class="mt-4">
    <x-form.label for="{{$name}}">
        {{$slot}}
    </x-form.label>

    <input
        {{$attributes}}
        type="file"
        id="{{$name}}"
        name="{{$name}}"
        class="file:mr-3 file:px-2 file:py-1 file:text-left file:text-white file:uppercase file:rounded file:transition-all file:duration-150 file:ease-linear file:outline-none file:text-md file:bg-blueGray-800 file:active:bg-blueGray-600 file:hover:shadow-lg file:focus:outline-none"
    >

    @error($name)
    <div class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</div>
    @enderror
</div>
