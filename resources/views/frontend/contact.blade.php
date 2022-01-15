<x-layouts.frontend-layout
    title="聯絡我們"
>
    <section id="contact" class="py-20 bg-blueGray-800">
        <div class="container px-4 mx-auto md:px-14">
            <div class="w-full h-full">
                <div class="mb-20 text-center text">
                    <h2 class="text-4xl font-medium leading-normal text-white">聯絡我們</h2>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-400">
                        如果我們收到訊息會盡快向您回復!
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-5 place-items-stretch lg:grid-cols-2">
                    <x-frontend.contact-infomation></x-frontend.contact-infomation>
                    <x-frontend.contact-form></x-frontend.contact-form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend-layout>
