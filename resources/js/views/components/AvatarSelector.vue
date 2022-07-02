<template>
    <div class="flex justify-center mt-5">
        <input hidden type="text" :id="name" :name="name" v-model="value">

        <div class="flex flex-wrap gap-5 m-5 mx-auto">
            <template v-for="(avatar,index) in avatars" :key="'avatar'+index">
                <div class="w-12 h-12 rounded-full cursor-pointer grayscale transition"
                     @click="changeAvatar(avatar)"
                     :class="value === avatar ? 'shadow-md grayscale-0 shadow-green-400' : '' "
                >
                    <img v-bind:src="avatar">
                </div>
            </template>
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

        const changeAvatar = (avatar) => {
            value.value = avatar;
        }

        return {
            value,
            changeAvatar
        }
    }
}
</script>
