<template>
    <div class="flex justify-around w-full">
        <input hidden type="text" :id="name" :name="name" v-model="value">

        <img v-bind:src="value"
             alt="頭像"
             class="object-contain h-60"
        >
        <div class="overflow-y-auto h-60">
            <div class="grid grid-cols-7 gap-5 m-5">
                <div
                    v-for="(avatar,index) in avatars"
                    :key="avatar"
                    class="col-span-1"
                >
                    <div
                        @click="value = avatar"
                        class="object-contain w-16 h-16 rounded-full cursor-pointer"
                        :class="value === avatar ? 'border-4 border-green-400 shadow-xl':''"
                    >
                        <img v-bind:src="avatar"
                             :alt="'頭像'+ index"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {ref} from "vue";

export default {
    props: {
        name: {
            type: String,
            required: true
        },
        avatars: {
            type: Array,
            required: true
        },
        default: {
            type: String
        }
    },
    setup(props) {
        const value = ref('');
        value.value = props.default ? props.default : '';

        return {
            value
        }
    }
}
</script>
