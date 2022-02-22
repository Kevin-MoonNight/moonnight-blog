<x-layouts.frontend-layout
    :title="$title"
    :description="$description"
    :keywords="$keywords"
>
    <section class="pt-5 bg-blueGray-200 md:py-10">
        <div class="container mx-auto w-full max-w-screen-xl min-h-screen md:px-14">
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

