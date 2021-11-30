<template>
    <div class="hidden z-50 w-1/5 h-full select-none xl:block">
        <nav class="overflow-y-auto py-8 w-full h-full text-blueGray-200 bg-blueGray-800">

            <div class="px-6 py-4 w-full text-indigo-500">
                <p class="text-2xl">MoonNight</p>
            </div>

            <menu-item v-for="item in items"
                       :name="item.name"
                       :icon="item.icon"
                       :link="item.link"
                       :childItems="item.childItems"
                       :close-nav="closeNav"
            />

        </nav>
    </div>

    <transition name="fade">
        <div v-if="isOpen" class="flex fixed z-50 w-full h-full xl:hidden">
            <nav class="overflow-y-auto py-8 w-3/4 h-full md:w-1/4 text-blueGray-200 bg-blueGray-800">

                <div class="px-6 py-4 w-full text-indigo-500">
                    <p class="text-2xl">MoonNight</p>
                </div>

                <menu-item v-for="item in items"
                           :name="item.name"
                           :icon="item.icon"
                           :link="item.link"
                           :childItems="item.childItems"
                           :close-nav="closeNav"
                />

            </nav>

            <div class="w-1/4 h-full bg-opacity-30 md:w-3/4 bg-blueGray-700" @click="isOpen = false"></div>
        </div>
    </transition>
</template>

<script>
import MenuItem from '../components/MenuItem';

export default {
    components: {
        MenuItem
    },
    props: ['isOpen', 'closeNav'],
    data() {
        return {
            items: [
                {
                    name: '儀錶板',
                    link: {
                        name: 'dashboard'
                    },
                    icon:
                        `<i class="fas fa-home"></i>`,
                    childItems: null
                },
                {
                    name: '文章管理',
                    icon:
                        `<i class="far fa-newspaper"></i>`,
                    childItems: [
                        {
                            name: '文章列表',
                            link: {
                                name: 'articlesManage'
                            },
                            icon:
                                `<i class="fas fa-list"></i>`,
                            childItems: null
                        },
                        {
                            name: '新增文章',
                            link: {
                                name: 'articlesCreate'
                            },
                            icon:
                                `<i class="fas fa-plus"></i>`,
                            childItems: null
                        },
                        {
                            name: '草稿',
                            link: {
                                name: 'articlesDraft'
                            },
                            icon:
                                `<i class="fas fa-newspaper"></i>`,
                            childItems: null
                        },
                        {
                            name: '垃圾桶',
                            link: {
                                name: 'articlesTrashed'
                            },
                            icon:
                                `<i class="fas fa-trash"></i>`,
                            childItems: null
                        }
                    ]
                },
                {
                    name: '標籤管理',
                    icon:
                        `<i class="fas fa-tags"></i>`,
                    childItems: [
                        {
                            name: '標籤列表',
                            link: {
                                name: 'tagsManage'
                            },
                            icon:
                                `<i class="fas fa-list"></i>`,
                            childItems: null
                        },
                        {
                            name: '新增標籤',
                            link: {
                                name: 'tagsCreate'
                            },
                            icon:
                                `<i class="fas fa-tag"></i>`,
                            childItems: null
                        }
                    ]
                },
                {
                    name: '訊息管理',
                    icon:
                        `<i class="far fa-comment-dots"></i>`,
                    childItems: [
                        {
                            name: '所有訊息',
                            link: {
                                name: 'messagesManage'
                            },
                            icon:
                                `<i class="fas fa-list"></i>`,
                            childItems: null
                        }
                    ]
                },
                {
                    name: '會員管理',
                    icon:
                        `<i class="fas fa-users"></i>`,
                    childItems: [
                        {
                            name: '所有會員',
                            link: {
                                name: 'usersManage'
                            },
                            icon:
                                `<i class="fas fa-list"></i>`,
                            childItems: null
                        },
                    ]
                },
                {
                    name: '個人設定',
                    link: {
                        name: 'setting'
                    },
                    icon:
                        ` <i class="far fa-user"></i>`,
                    childItems: null
                },
                {
                    name: '返回首頁',
                    link: {
                        name: 'home'
                    },
                    icon: `<i class="fas fa-reply"></i>`,
                    childItems: null
                },
            ]
        }
    }
}
</script>
