<template>
    <div>
        <address class="grid grid-cols-1 gap-5 not-italic md:grid-cols-3">
            <div :title="email"
                 v-clipboard:copy="email" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer group">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-envelope"></i>
                </div>
                <h6 class="mt-5 text-xl text-white group-hover:text-indigo-500">電子信箱</h6>
                <p class="mt-2 mb-4 break-words text-blueGray-400 group-hover:text-indigo-500">
                    {{ email }}
                </p>
            </div>

            <div :title="phone"
                 v-clipboard:copy="phone" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer group">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-phone"></i>
                </div>
                <h5 class="mt-5 text-xl text-white group-hover:text-indigo-500">電話</h5>
                <p class="mt-2 mb-4 text-blueGray-400 group-hover:text-indigo-500">
                    {{ phone }}
                </p>
            </div>

            <div :title="address"
                 v-clipboard:copy="address" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer group">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h5 class="mt-5 text-xl text-white group-hover:text-indigo-500">地址</h5>
                <p class="mt-2 mb-4 text-blueGray-400 group-hover:text-indigo-500">
                    {{ address }}
                </p>
            </div>
        </address>
        <google-map></google-map>
    </div>
</template>

<script>
import {onCopy} from "../../api/utils";
import GoogleMap from "./GoogleMaps";

export default {
    components: {
        GoogleMap
    },
    data() {
        return {
            email: '暫不提供',
            phone: '暫不提供',
            address: '暫不提供',
            onCopy: onCopy
        }
    }
}
</script>
