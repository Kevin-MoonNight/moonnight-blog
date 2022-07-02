<div>
    <address id="clipboard-app" class="grid grid-cols-3 gap-5 not-italic break-words">
        <clipboard value="{{env('APP_EMAIL')}}">
            <x-contacts.contact-item
                :title="'電子信箱'"
                :description="env('APP_EMAIL')"
            >
                <i class="fas fa-envelope"></i>
            </x-contacts.contact-item>
        </clipboard>

        <clipboard value="{{env('APP_PHONE')}}">
            <x-contacts.contact-item
                :title="'電話'"
                :description="env('APP_PHONE')"
            >
                <i class="fas fa-phone"></i>
            </x-contacts.contact-item>
        </clipboard>

        <clipboard value="{{env('APP_ADDRESS')}}">
            <x-contacts.contact-item
                :title="'地址'"
                :description="env('APP_ADDRESS')"
            >
                <i class="fas fa-map-marker-alt"></i>
            </x-contacts.contact-item>
        </clipboard>
    </address>

    <div id="contact-app">
        <google-maps
            api-Key="{{env('APP_GOOGLE_MAP_API_KEY')}}"
        ></google-maps>
    </div>
</div>
<script src="{{ mix('/js/contact/contact.js') }}" defer></script>
<script src="{{ mix('/js/clipboard/clipboard.js') }}" defer></script>

