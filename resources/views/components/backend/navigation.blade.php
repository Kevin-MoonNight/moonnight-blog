<nav class="overflow-y-auto py-8 w-full h-full text-blueGray-200 bg-blueGray-800">

    <div class="px-6 py-4 w-full text-indigo-500">
        <p class="text-2xl">MoonNight</p>
    </div>

    <nav-item
        name="儀錶板"
        icon="<i class='fas fa-home'></i>"
        link="{{route('dashboard')}}"
    ></nav-item>

    <nav-item
        name="文章管理"
        icon="<i class='far fa-newspaper'></i>"
    >
        <nav-item
            name="文章列表"
            link="{{route('dashboard.articles.index')}}"
        ></nav-item>
        <nav-item
            name="新增文章"
            link="{{route('dashboard.articles.create')}}"
        ></nav-item>
        <nav-item
            name="草稿"
            link="{{route('dashboard.articles.draft')}}"
        ></nav-item>
        <nav-item
            name="垃圾桶"
            link="{{route('dashboard.articles.trashed')}}"
        ></nav-item>
    </nav-item>

    <nav-item
        name="標籤管理"
        icon="<i class='fas fa-tags'></i>"
    >
        <nav-item
            name="標籤列表"
            link="{{route('dashboard.tags.index')}}"
        ></nav-item>
        <nav-item
            name="新增標籤"
            link="{{route('dashboard.tags.create')}}"
        ></nav-item>
    </nav-item>


    <nav-item
        name="作品管理"
        icon="<i class='fas fa-code'></i>"
    >
        <nav-item
            name="作品列表"
            link="{{route('dashboard.products.index')}}"
        ></nav-item>
        <nav-item
            name="新增作品"
            link="{{route('dashboard.products.create')}}"
        ></nav-item>
    </nav-item>

    <nav-item
        name="訊息管理"
        icon="<i class='far fa-comment-dots'></i>"
    >
        <nav-item
            name="所有訊息"
            link="{{route('dashboard')}}"
        ></nav-item>
    </nav-item>

    <nav-item
        name="會員管理"
        icon="<i class='fas fa-users'></i>"
    >
        <nav-item
            name="所有會員"
            link="{{route('dashboard')}}"
        ></nav-item>
    </nav-item>

    <nav-item
        name="個人設定"
        icon="<i class='far fa-user'></i>"
        link="{{route('dashboard')}}"
    ></nav-item>

    <nav-item
        name="返回首頁"
        icon="<i class='fas fa-reply'></i>"
        link="{{route('root')}}"
    ></nav-item>

</nav>
