<div class="mt-4">
    <x-form.label for="{{$name}}">
        {{$slot}}
    </x-form.label>

    <div class="flex items-center">
        <input
            {{$attributes}}
            type="text"
            id="{{$name}}"
            name="{{$name}}"
            placeholder="{{$slot}}"
            class="block px-3 py-2 mt-1 bg-white rounded-md border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
        >
        <div class="ml-3">
            <img src="{{Captcha::src()}}">
        </div>
    </div>


    @error('captcha')
    <div class="text-red-500 text-sm mt-2 ml-1">驗證碼錯誤</div>
    @enderror
</div>
