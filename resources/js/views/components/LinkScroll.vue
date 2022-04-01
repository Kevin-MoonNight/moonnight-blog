<template>
    <a :href="link"
       class="inline-block relative px-4 py-2 mx-2 font-semibold tracking-wide cursor-pointer animation-hover"
       :class="(currentLink === link ? 'text-indigo-500 animation-active' : 'text-gray-600 hover:text-indigo-500')"
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
