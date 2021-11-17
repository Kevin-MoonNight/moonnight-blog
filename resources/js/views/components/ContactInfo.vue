<template>
    <div>
        <div class="grid grid-cols-1 gap-5 group md:grid-cols-3">
            <div :title="email"
                 v-clipboard:copy="email" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-envelope"></i>
                </div>
                <h6 class="mt-5 text-xl text-white">電子信箱</h6>
                <p class="mt-2 mb-4 break-words text-blueGray-400">{{ email }}</p>
            </div>

            <div :title="phone"
                 v-clipboard:copy="phone" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-phone"></i>
                </div>
                <h5 class="mt-5 text-xl text-white">電話</h5>
                <p class="mt-2 mb-4 text-blueGray-400">{{ phone }}</p>
            </div>

            <div :title="address"
                 v-clipboard:copy="address" v-clipboard:success="onCopy"
                 class="px-4 w-full text-center cursor-pointer">

                <div
                    class="inline-flex justify-center items-center p-3 w-12 h-12 bg-white rounded-full shadow-lg text-blueGray-800">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h5 class="mt-5 text-xl text-white">地址</h5>
                <p class="mt-2 mb-4 text-blueGray-400">
                    {{ address }}
                </p>
            </div>
        </div>

        <div id="map" class="w-full h-96"></div>
    </div>
</template>

<script>
import {onMounted} from "vue";
import {Loader} from "@googlemaps/js-api-loader";
import {onCopy} from "../../api/utils";

export default {
    data() {
        return {
            email: '123456@example.com',
            phone: '0912345678',
            address: '新北市'
        }
    },
    setup() {
        const loader = new Loader({
            apiKey: 'AIzaSyA8y_JaHqspYZIXz34oLJswiT8hOK6a3aM',
            version: "weekly",
            libraries: ["places"],
            language: "zh-TW",
        });

        const mapOptions = {
            center: {
                lat: 22.65226469369947,
                lng: 120.32887547671777
            },
            zoom: 15,
            mapTypeControl: false,
            fullscreenControl: false,
        };
        const initMap = async () => {
            loader.load()
                .then((google) => {
                    const map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    new google.maps.Marker({
                        position: {
                            lat: 22.65226469369947,
                            lng: 120.32887547671777
                        },
                        map: map,
                        draggable: true,
                        icon: {
                            url: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                            size: new google.maps.Size(30, 30),
                            scaledSize: new google.maps.Size(30, 30),
                        },
                    });
                });
        };

        const setting = {
            placement: 'top',
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
            ],
        };
        onMounted(async () => {
            await initMap();
        });

        return {
            onCopy: onCopy
        }
    }
}
</script>
