<div id="contact-app">
    <address class="grid grid-cols-3 gap-5 not-italic">
        <contact-item
            title="電子信箱"
            value="{{env('APP_EMAIL')}}"
        >
            <i class="fas fa-envelope"></i>
        </contact-item>

        <contact-item
            title="電話"
            value="{{env('APP_PHONE')}}"
        >
            <i class="fas fa-phone"></i>
        </contact-item>

        <contact-item
            title="地址"
            value="{{env('APP_ADDRESS')}}"
        >
            <i class="fas fa-map-marker-alt"></i>
        </contact-item>
    </address>
    <google-maps></google-maps>
</div>
<script src="{{ mix('/js/contact/contact.js') }}" defer></script>

