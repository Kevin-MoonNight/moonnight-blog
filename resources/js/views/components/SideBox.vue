<template>
    <div class="p-3 bg-white rounded-md shadow-md">
        <h1 class="text-center">{{ name }}</h1>
        <hr class="my-3 border-blueGray-200"/>

        <div v-if="!isShow" class="flex flex-wrap place-content-center my-10 w-full h-full">
            <loading-icon/>
        </div>
        <transition name="fade">
            <div v-if="isShow" class="flex flex-wrap gap-2 w-full">
                <slot/>
            </div>
        </transition>
        
    </div>
</template>
<script>
import LoadingIcon from "./LoadingIcon";

export default {
    components: {LoadingIcon},
    props: ['name', 'isShow']
}
</script>
