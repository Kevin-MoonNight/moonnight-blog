<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <slot name="header"></slot>
        </tr>
        </thead>
        <tbody>
            <slot name="body"></slot>
        </tbody>
    </table>
</template>

<script>
export default {

}
</script>
