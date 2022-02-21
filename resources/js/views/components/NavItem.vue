<template>
    <a v-if="link"
       :href="link"
       class="flex justify-between items-center w-full h-16 duration-200 transform cursor-pointer hover:pl-1 hover:text-indigo-500"
    >
        <div class="flex items-center">
            <div v-if="icon" v-html="icon"></div>
            <i v-else class="far fa-circle"></i>

            <p class="ml-3">{{ name }}</p>
        </div>
    </a>

    <div v-else
         @click="isOpen = !isOpen"
         class="flex justify-between items-center w-full h-16 duration-200 transform cursor-pointer hover:pl-1 hover:text-indigo-500"
    >
        <div class="flex items-center">
            <div v-if="icon" v-html="icon"></div>
            <i v-else class="far fa-circle"></i>

            <p class="ml-3">{{ name }}</p>
        </div>

        <i v-if="isOpen" class="fas fa-chevron-down"></i>
        <i v-else class="fas fa-chevron-right"></i>
    </div>

    <transition name="list">
        <div v-show="isOpen" class="pl-6">
            <slot></slot>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            required: true
        },
        link: {
            type: String
        },
        icon: {
            type: String
        }
    },
    data() {
        return {
            isOpen: false
        }
    }
}
</script>
