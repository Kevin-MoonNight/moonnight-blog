<x-layouts.frontend-layout>
    <main class="select-none">
        <section class="py-10 bg-blueGray-800">
            <div class="flex items-stretch md:min-h-screen">
                <div class="container px-4 mx-auto md:px-14">
                    <div class="grid grid-cols-1 gap-10 place-items-center w-full h-full lg:grid-cols-5">
                        <div class="col-span-1 lg:col-span-2">
                            <div class="text">
                                <h1 class="text-5xl text-white">
                                    慕耐工作室
                                </h1>
                                <p class="mt-4 text-lg text-blueGray-200">
                                    演算法程式、桌面軟體、品牌形象網站、客製化網站服務
                                </p>
                                <p class="mt-4 text-lg text-blueGray-200">

                                </p>
                                <div class="flex flex-wrap gap-5 mt-20 serviceBnt">
                                    <a href="#service"
                                       class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        所有服務
                                    </a>
                                    <a href="{{route('contact')}}"
                                       class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        聯絡我們
                                    </a>
                                    <a href="{{route('articles.index')}}"
                                       class="block px-3 py-2 text-lg rounded-sm text-blueGray-800 bg-blueGray-300 hover:text-indigo-500">
                                        所有文章
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="hidden show md:w-full md:h-full md:flex md:show md:px-16 md:items-center md:justify-center md:col-span-1 lg:col-span-3">
                            <img src="{{mix('/images/cover.avif')}}"
                                 class="object-contain w-auto h-auto rounded-md shadow-2xl"
                                 loading="lazy"
                                 alt="封面"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="py-20 bg-blueGray-100">
            <div class="flex items-center md:min-h-screen">
                <div class="container px-4 mx-auto md:px-14">
                    <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                        <div class="text">
                            <h3 class="mb-2 text-3xl font-medium leading-normal">
                                慕耐是由一群學生所組成的工作室
                            </h3>
                            <p class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                我們是一群熱愛程式的學生，擁有強大的物件導向、資料結構、演算法、作業系統和資料庫基礎，並且利用課餘閒暇時間接案，在堅實的基礎上替您打造所需的程式。
                            </p>
                        </div>

                        <div class="bottom">
                            <div class="w-full h-full">
                                <img src="{{mix('/images/about.avif')}}"
                                     alt="關於我們"
                                     class="w-full h-auto"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="py-20 bg-blueGray-100">
            <div class="container px-4 mx-auto md:px-14">
                <div class="w-full h-full">
                    <div class="text-center text">
                        <h2 class="text-3xl font-medium leading-normal">
                            我們所提供的服務
                        </h2>
                    </div>

                    <div class="mt-20 h-2/3">
                        <carousel :items="services"></carousel>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-blueGray-100">
            <div class="container px-4 mx-auto md:px-14">
                <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                    <div class="bottom">
                        <div class="w-full h-auto">
                            <img src="{{mix('/images/algorithm.avif')}}"
                                 alt="services.algorithm.title"
                                 class="w-full h-auto"
                            />
                        </div>
                    </div>

                    <div class="text">
                        <h3 class="mb-2 text-3xl font-medium leading-normal">
                            演算法程式開發
                        </h3>
                        <ol class="list-decimal list-inside">
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                把演算法邏輯製作流程圖，並且交由給業主核對才開始寫程式，減少開發中解決錯誤所額外花費的時間。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                並且使用TDD方式開發，減少開發中測試程式邏輯所花費的時間成本。
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-blueGray-100">
            <div class="container px-4 mx-auto md:px-14">
                <div class="grid grid-cols-1 gap-10 w-full h-full lg:grid-cols-2">
                    <div class="h-full text">
                        <h3 class="mb-2 text-3xl font-medium leading-normal">
                            網站設計開發
                        </h3>
                        <ol class="list-decimal list-inside">
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                RWD響應式網站技術，讓您的網站不管在哪種裝置上面都能夠正常顯示畫面。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                內建SEO搜尋引擎優化，增加網站被用戶搜尋到的機率。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                客製化畫面設計，製作專屬於您的網站。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                後台管理系統，讓您可以自由的修改網頁內容。
                            </li>
                            <li class="mt-4 text-lg font-medium leading-relaxed text-blueGray-600">
                                並且使用TDD方式開發，減少開發中測試程式邏輯所花費的時間成本。
                            </li>
                        </ol>
                    </div>

                    <div class="bottom">
                        <div class="w-full h-auto">
                            <img src="{{mix('/images/corporation.avif')}}"
                                 alt="網頁設計"
                                 loading="lazy"
                                 class="w-full h-auto"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend-layout>
