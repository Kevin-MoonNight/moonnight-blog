<div class="mt-4">
    <x-form.label for="{{$name}}">
        {{$slot}}
    </x-form.label>

    <div id="markdown-editor">
        <markdown-editor
            {{ $attributes }}
            name="{{$name}}"
            placeholder="{{$slot}}"
        ></markdown-editor>
    </div>

    @error($name)
    <div class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</div>
    @enderror
</div>
<script src="{{ mix('/js/markdown-edit/markdown-edit.js') }}" defer></script>
