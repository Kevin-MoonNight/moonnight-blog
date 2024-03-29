<x-layouts.frontend-layout
    :title="$title"
    :description="$description"
    :keywords="$keywords"
>
    <section id="articles-app" class="py-10 mt-20 bg-gray-100 lg:mt-30 md:py-20">
        <div class="container mx-auto w-full max-w-screen-xl min-h-screen md:px-8 lg:px-14">
            <div class="grid grid-cols-3 gap-5 place-items-stretch w-full">
                <main class="col-span-3 lg:col-span-2">
                    {{$slot}}
                </main>

                <aside class="hidden select-none lg:block lg:col-span-1">
                    <div class="sticky top-20 space-y-5 w-full">
                        <x-articles.popular-articles-side-box></x-articles.popular-articles-side-box>
                        <x-tags.tags-side-box></x-tags.tags-side-box>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</x-layouts.frontend-layout>
<script src="{{ mix('/js/articles/articles.js') }}" defer></script>
