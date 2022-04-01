<template>
    <a :href="link"
       class="flex flex-col items-center px-3 py-4 text-lg font-semibold tracking-wide transition-all"
       :class="(currentLink === link ? 'text-indigo-500' : 'text-gray-600 hover:text-indigo-500')"
    >
        <slot></slot>
    </a>
</template>

<script>
export default {
    props: {
        link: {
            type: String,
            required: true
        },
        currentLink: {
            type: String,
            required: true
        }
    }
}
</script>
