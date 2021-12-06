<template>
    <div class="px-6 w-full">
        <div v-if="childItems !== null">
            <div @click="isOpen = !isOpen"
                 class="flex justify-between items-center w-full h-16 duration-200 transform cursor-pointer hover:pl-1 hover:text-indigo-500">

                <div class="flex items-center">
                    <div v-html="icon"/>
                    <p class="ml-3">{{ name }}</p>
                </div>
                <div v-if="isOpen">
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div v-else>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div v-else @click="closeNav"
             class="flex justify-between items-center w-full h-16 duration-200 transform hover:pl-1 hover:text-indigo-500">
            <router-link :to="link" class="flex items-center">
                <div v-html="icon"/>
                <p class="ml-3">{{ name }}</p>
            </router-link>
        </div>

        <transition name="list">
            <div v-show="isOpen" class="pl-3">
                <menu-item v-for="child in childItems"
                           :name="child.name"
                           :icon="child.icon"
                           :link="child.link"
                           :childItems="child.childItems"
                           :close-nav="closeNav"
                />
            </div>
        </transition>
    </div>
</template>

<script>
import {toRefs} from "vue";

export default {
    props: ['name', 'link', 'icon', 'childItems', 'closeNav'],
    data() {
        return {
            isOpen: false
        }
    },
    setup(props) {
        const {name, link, icon, childItems, closeNav} = toRefs(props);

        return {
            name,
            link,
            icon,
            childItems,
            closeNav
        }
    }
}
</script>
