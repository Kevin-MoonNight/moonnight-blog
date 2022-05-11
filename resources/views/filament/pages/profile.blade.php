<x-filament::page>
    <form
        method="post"
        action="{{route('user-profile-information.update')}}"
        class="space-y-6"
    >
        @csrf
        @method('PUT')
        {{$this->form}}

        <div class="flex flex-wrap items-center gap-4 justify-start">
            <x-filament::button type="submit">
                Save
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
