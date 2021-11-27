<template>
    <div class="overflow-x-auto pb-10 w-full h-full">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3 xl:grid-cols-4">
            <div v-for="item in items" class="col-span-1">
                <div class="p-3 bg-white rounded-sm shadow-md">
                    <h1 class="font-bold text-center text-blueGray-600">{{ item.name }}</h1>
                    <hr class="my-3 border-blueGray-200"/>

                    <div class="flex flex-wrap gap-2 w-full">
                        <p v-for="option in item.childItems" @click="redirect(option.link)"
                           class="px-4 py-1 w-auto text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:text-indigo-500 hover:bg-blueGray-300">
                            {{ option.name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useRouter} from "vue-router";

export default {
    data() {
        return {
            items: [
                {
                    name: '文章管理',
                    childItems: [
                        {
                            name: '文章列表',
                            link: 'articlesManage',
                        },
                        {
                            name: '新增文章',
                            link: 'articlesCreate',
                        },
                        {
                            name: '草稿',
                            link: 'articlesDraft',
                        },
                        {
                            name: '垃圾桶',
                            link: 'articlesTrashed',
                        }
                    ]
                },
                {
                    name: '訊息管理',
                    childItems: [
                        {
                            name: '所有訊息',
                            link: 'messagesManage',
                        }
                    ]
                },
                {
                    name: '會員管理',
                    childItems: [
                        {
                            name: '所有會員',
                            link: 'usersManage',
                        }
                    ]
                },
                {
                    name: '其他',
                    childItems: [
                        {
                            name: '個人設定',
                            link: 'setting',
                        }
                    ]
                }
            ]
        }
    },
    setup() {
        const router = useRouter();
        const redirect = (link) => {
            router.push({name: link});
        }

        return {
            redirect
        }
    }
}
</script>
