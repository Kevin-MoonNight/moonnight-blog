<section id="services" class="bg-white">
    <div class="px-8 py-20 mx-auto max-w-screen-xl xl:px-16">
        <div class="text-center">
            <h2 class="text-3xl font-medium leading-normal text-black xl:text-4xl">
                我們所提供的服務
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-x-5 gap-y-8 mt-20 md:grid-cols-2 lg:grid-cols-3">
            <x-homes.services-item
                :title="'網站開發'"
                :img-link="mix('/images/website.svg')"
            >
                網站設計整合能力將影響網站曝光能力，包含網站架構、後台操作、SEO排名能力... 都是網站成敗關鍵，選錯網頁設計公司基本上就已經失敗一半。
            </x-homes.services-item>

            <x-homes.services-item
                :title="'演算法程式開發'"
                :img-link="mix('/images/flow-chart.svg')"
            >
                演算法是很複雜的學問，我們可以將演算法製作成程式，讓使用者能用簡單的指令讓電腦達成目標。
            </x-homes.services-item>

            <x-homes.services-item
                :title="'電腦應用軟體開發'"
                :img-link="mix('/images/desktop.svg')"
            >
                針對客戶對資訊系統的需求，量身打造專屬的商用系統，並保留系統彈性，不僅提升客戶現在的競爭力，更保障了未來的擴充性。
            </x-homes.services-item>

            <x-homes.services-item
                :title="'主機託管'"
                :img-link="mix('/images/database.svg')"
            >
                簡單來說即是將公司內的主機／伺服器( Server ) 托管於我們的專業機房中，企業不但可省下一筆自行架設與管理機房的費用，還有專業網路工程團隊提供維運服務，全年 365 天 24
                小時監控、維護企業最重要的資訊資產。
            </x-homes.services-item>
            <x-homes.services-item
                :title="'網站維護'"
                :img-link="mix('/images/gear.svg')"
            >
                網站維護是一門學問，有許多面相要顧及，以及多種工具需要學習。
                放心交給我們維護網站，您可以專注在事業的發展上。
            </x-homes.services-item>

            <x-homes.services-item
                :title="'其他客製化需求'"
                :img-link="mix('/images/list.svg')"
            >
                專業的程式設計團隊，能夠針對您的需求為您規劃設計一套專屬的軟體，將繁瑣、重複、固定的工作，透過軟體系統來提昇企業生產品質、降低營運成本、提昇競爭力，並且在充滿挑戰的市場機制之下提昇企業的獲利能力。
            </x-homes.services-item>
        </div>
    </div>
</section>
