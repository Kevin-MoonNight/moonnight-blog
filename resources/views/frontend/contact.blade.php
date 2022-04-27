<x-layouts.frontend-layout
    title="聯絡我們"
>
    <section class="py-20 bg-gray-100">
        <div class="px-8 mx-auto max-w-screen-xl xl:px-16">
            @if (session('message'))
                <div class="py-2 mb-10 text-center bg-green-300">
                    <p class="font-semibold tracking-wide text-white">
                        {{ session('message') }}
                    </p>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-5 gap-y-10 place-items-stretch lg:grid-cols-2">
                <x-contacts.contact-information></x-contacts.contact-information>
                <x-contacts.contact-form></x-contacts.contact-form>
            </div>
        </div>
    </section>
</x-layouts.frontend-layout>
