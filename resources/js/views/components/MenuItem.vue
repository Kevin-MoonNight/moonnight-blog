<template>
    <div class="w-full">
        <div v-if="childItems.length > 0">

            <div @click="isOpen = !isOpen" class="flex justify-between items-center transform duration-200 h-16 w-full px-6 hover:pl-7 hover:text-purple-500 cursor-pointer">
                <div class="flex items-center space-x-3">
                    <div v-html="icon"/>
                    <p>{{name}}</p>
                </div>

                <div v-if="isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <div v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
            <transition name="list">
                <div v-show="isOpen" class="pl-5">
                    <menu-item v-if="childItems.length > 0" v-for="child in childItems"
                               v-bind:name="child.name"
                               v-bind:icon="child.icon"
                               v-bind:link="child.link"
                               v-bind:child="child.child"
                    />
                </div>
            </transition>
        </div>
        <div v-else class="flex justify-between items-center transform duration-200 h-16 w-full px-6 hover:pl-7 hover:text-purple-500">
            <router-link :to="link" class="flex items-center space-x-3">
                <div v-html="icon"/>
                <p>{{name}}</p>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: `menu-item`,
        props:{
            name: String,
            link: {
                name:String
            },
            icon: null,
            childItems: {
                type: Array,
                default: []
            }
        },
        data (){
            return {
                isOpen:false
            }
        }
    }
</script>
