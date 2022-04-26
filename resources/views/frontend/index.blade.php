<x-layouts.frontend-layout>
    <div id="home-app" class="">
        <section class="bg-gray-100">
            <div class="px-8 mx-auto max-w-screen-xl xl:px-16">
                <div class="grid grid-cols-1 gap-8 content-center min-h-screen md:grid-cols-2">
                    <div class="flex flex-col justify-center items-start">
                        <h1 class="text-3xl font-medium leading-normal text-black lg:text-4xl xl:text-5xl">
                            歡迎來到
                            <strong class="mt-1 text-6xl leading-normal text-black">
                                <cover-title></cover-title>
                            </strong>
                        </h1>

                        <p class="mt-4 font-semibold leading-normal text-gray-600">
                            我們提供客製化網站設計、演算法程式開發及應用軟體開發等多項服務
                        </p>

                        <div class="mt-10">
                            <x-button-primary
                                :link="'#service'"
                            >
                                查看服務
                            </x-button-primary>
                        </div>
                    </div>
                    <div class="hidden w-full md:flex">
                        <div class="w-full h-full">
                            <img
                                class="rounded-md shadow-2xl"
                                src="{{mix('/images/cover.avif')}}"
                                alt="Cover"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="">
            <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">
                <div class="text-center">
                    <h2 class="text-3xl font-medium leading-normal text-black xl:text-4xl">
                        我們所提供的服務
                    </h2>
                </div>

                <div class="grid grid-cols-1 gap-x-5 gap-y-8 mt-20 md:grid-cols-2 lg:grid-cols-3">
                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/website.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                網站開發
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            網站設計整合能力將影響網站曝光能力，包含網站架構、後台操作、SEO排名能力... 都是網站成敗關鍵，選錯網頁設計公司基本上就已經失敗一半。
                        </p>
                    </div>

                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/flow-chart.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                演算法程式開發
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            演算法是很複雜的學問，我們可以將演算法製作成程式，讓使用者能用簡單的指令讓電腦達成目標。
                        </p>
                    </div>

                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/desktop.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                電腦應用軟體開發
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            針對客戶對資訊系統的需求，量身打造專屬的商用系統，並保留系統彈性，不僅提升客戶現在的競爭力，更保障了未來的擴充性。
                        </p>
                    </div>

                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/database.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                主機託管
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            簡單來說即是將公司內的主機／伺服器( Server ) 托管於我們的專業機房中，企業不但可省下一筆自行架設與管理機房的費用，還有專業網路工程團隊提供維運服務，全年 365 天 24
                            小時監控、維護企業最重要的資訊資產。
                        </p>
                    </div>

                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/gear.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                網站維護
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            網站維護是一門學問，有許多面相要顧及，以及多種工具需要學習。
                            放心交給我們維護網站，您可以專注在事業的發展上。
                        </p>
                    </div>

                    <div class="p-3 group">
                        <div class="">
                            <img
                                src="{{mix('/images/list.svg')}}"
                                class="w-12"
                            />
                        </div>
                        <h4 class="mt-8 text-lg leading-relaxed text-gray-800 md:text-xl lg:text-2xl">
                            <strong
                                class="font-medium transition duration-200 ease-in-out group-hover:text-indigo-500">
                                其他客製化需求
                            </strong>
                        </h4>
                        <p class="mt-4 leading-normal text-gray-600">
                            專業的程式設計團隊，能夠針對您的需求為您規劃設計一套專屬的軟體，將繁瑣、重複、固定的工作，透過軟體系統來提昇企業生產品質、降低營運成本、提昇競爭力，並且在充滿挑戰的市場機制之下提昇企業的獲利能力。
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section id="products" class="bg-gray-100">
            <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">

                <div class="text-center">
                    <h2 class="text-3xl font-medium leading-normal text-black xl:text-4xl">
                        與我們合作的案例
                    </h2>
                </div>

                <div class="mx-6 mt-20 md:mx-10 lg:mx-20">
                    <div class="flex items-center py-20 select-none">
                        <carousel
                            :products="{{\App\Models\Product::latest()->take(10)->get()->toJson()}}"
                        ></carousel>
                    </div>
                    <div class="flex justify-end mt-10">
                        <x-button-primary
                            :link="route('products.index')"
                        >
                            查看更多案例
                        </x-button-primary>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="">
            <div class="px-8 py-20 mx-auto max-w-screen-xl md:py-0 xl:px-16">
                <div
                    class="grid grid-cols-1 gap-5 content-center place-items-center md:min-h-screen md:grid-cols-2 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <img src="{{mix('/images/about.avif')}}"
                             loading="lazy"
                             class="w-full h-auto"
                             alt="About"
                        />
                    </div>

                    <div class="flex flex-col justify-center mt-6 md:mt-0 lg:col-start-9 lg:col-span-4">
                        <h3 class="text-3xl font-medium tracking-wide leading-normal text-black md:text-4xl">
                            關於慕耐程式工作室
                        </h3>
                        <p class="mt-2 tracking-wide leading-relaxed text-gray-600">
                            我們提供許多的程式服務，並且我們擁有一個經驗豐富團隊，製作做出高品質的作品。
                        </p>
                        <ul class="mt-8 space-y-4 text-lg tracking-wide leading-relaxed list-disc list-inside text-black transition-all">
                            <li class="hover:ml-2 hover:underline hover:underline-offset-4 hover:decoration-indigo-500">
                                完善服務機制，提供您專業諮詢
                            </li>
                            <li class="hover:ml-2 hover:underline hover:underline-offset-4 hover:decoration-indigo-500">
                                經驗豐富，製作出高品質的作品
                            </li>
                            <li class="hover:ml-2 hover:underline hover:underline-offset-4 hover:decoration-indigo-500">
                                最高效率，回報重點製作進度
                            </li>
                            <li class="hover:ml-2 hover:underline hover:underline-offset-4 hover:decoration-indigo-500">
                                售後保固，讓您無後顧之憂
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="bg-gray-100">
            <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">

                <div class="bg-gray-100">
                    <div class="mx-6 md:mx-10 lg:mx-20">
                        <div
                            class="flex flex-col justify-between items-center px-6 py-8 w-full bg-white rounded-xl sm:py-14 sm:px-12 lg:px-16 sm:flex-row">
                            <div class="flex flex-col">
                                <h5 class="text-xl font-medium leading-relaxed text-black sm:text-2xl lg:text-3xl">
                                    對以上的服務有興趣的話 <br/> 聯絡我們!
                                </h5>
                                <p class="mt-4 leading-normal text-gray-600 sm:text-lg lg:text-xl">
                                    我們會盡快回覆您!
                                </p>
                            </div>

                            <x-button-primary
                                :link="route('contact')"
                            >
                                聯絡我們
                            </x-button-primary>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.frontend-layout>
<script src="{{ mix('/js/home/home.js') }}" defer></script>
