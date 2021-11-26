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
                                name: 'dashboard'
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
                        name: 'dashboard'
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
                    icon:
                        ` <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>`,
                    childItems: null
                },
            ]
        }
    }
}
</script>
