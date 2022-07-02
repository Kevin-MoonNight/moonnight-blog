<div class="mt-4">
    <x-form.label for="{{$name}}">
        {{$slot}}
    </x-form.label>

    <textarea
        {{ $attributes }}
        id="{{$name}}"
        name="{{$name}}"
        placeholder="{{$slot}}"
        cols="5"
        rows="5"
        class="block px-3 py-2 mt-1 w-full bg-white rounded-md border-2 border-gray-300 focus:outline-none focus:border-indigo-500"
    ></textarea>

    @error($name)
    <div class="mt-2 ml-1 text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>
