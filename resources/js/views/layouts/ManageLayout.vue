<template>
    <search-box v-if="search" :link="link"></search-box>

    <div class="mt-10 bg-white rounded-sm shadow-md">
        <div class="overflow-x-auto w-full h-full min-h-screen" :class="!isShow ? 'h-screen' : ''">
            <div v-if="!isShow" class="flex flex-wrap place-content-center w-full h-full">
                <loading-icon></loading-icon>
            </div>

            <div v-else>
                <slot></slot>
            </div>
        </div>
    </div>

    <div v-if="paginate" class="mt-10 w-full h-auto bg-white rounded-sm">
        <paginator :items="data" :link="link"></paginator>
    </div>
</template>

<script>
import paginator from "../components/Paginator";
import SearchBox from "../components/SearchBox";
import LoadingIcon from "../components/LoadingIcon";

export default {
    components: {
        LoadingIcon,
        SearchBox,
        paginator
    },
    props: {
        data: {
            type: Object
        },
        link: {
            type: String,
            default: null
        },
        isShow: {
            type: Boolean,
            default: true
        },
        search: {
            type: Boolean,
            default: false
        },
        paginate: {
            type: Boolean,
            default: false
        }
    }
}
</script>
