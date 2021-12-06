<template>
    <div id="map" class="w-full h-96"></div>
</template>

<script>
import {Loader} from "@googlemaps/js-api-loader";
import {onMounted} from "vue";

export default {
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
                        draggable: true
                    });
                });
        };

        // 響鈴條件：設定和控制在哪些情況下，呼叫 callback 函式
        let options = {
            rootMargin: '0px',
            threshold: 0.5,
        }
        // 條件達成做什麼：符合設定條件下，目標進入或離開 viewport 時觸發此 callback 函式
        let callback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    //  只在目標元素進入 viewport 時執行這裡的工作
                    initMap();
                    observer.unobserve(entry.target)
                }
            })
        }

        // 製作鈴鐺：建立一個 intersection observer，帶入相關設定資訊
        let observer = new IntersectionObserver(callback, options);
        onMounted(() => {
            //  選定要觀察的對象
            const googleMap = document.querySelector('#map');
            // 設定觀察
            observer.observe(googleMap);
        });
    }
}
</script>
