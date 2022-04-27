<template>
    <div class="cursor-pointer">
        <div
            v-clipboard:copy="value"
            :title="value"
        >
            <slot></slot>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        value: {
            type: String,
            required: true
        }
    }
}
</script>

