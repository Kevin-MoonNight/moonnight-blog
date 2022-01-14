<template>
    <div class="relative">
        <button class="flex items-center" @click="dropdown = !dropdown">
            <slot></slot>
        </button>

        <transition name="list">
            <div
                v-show="dropdown"
                class="absolute mt-12"
            >
                <slot name="content"></slot>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dropdown: false
        }
    }
}
</script>
