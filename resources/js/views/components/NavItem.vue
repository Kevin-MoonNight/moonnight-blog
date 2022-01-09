<template>
    <div class="px-6 w-full">
        <div @click="isOpen = !isOpen">
            <div
                class="flex justify-between items-center w-full h-16 duration-200 transform cursor-pointer hover:pl-1 hover:text-indigo-500">
                <a v-if="link" :href="link" class="flex items-center">
                    <div v-if="icon" v-html="icon"></div>
                    <div v-else>
                        <i class="far fa-circle"></i>
                    </div>

                    <p class="ml-3">{{ name }}</p>
                </a>
                <div v-else class="flex items-center">
                    <div v-if="icon" v-html="icon"></div>
                    <div v-else>
                        <i class="far fa-circle"></i>
                    </div>

                    <p class="ml-3">{{ name }}</p>
                </div>

                <div v-if="!link">
                    <div v-if="isOpen">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div v-else>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <transition name="list">
            <div v-show="isOpen">
                <slot></slot>
            </div>
        </transition>
    </div>
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
