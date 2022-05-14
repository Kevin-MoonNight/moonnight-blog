<div id="avatar-selector-app">
    <avatar-selector
        :avatars="{{$avatars->toJson()}}"
        name="{{$name}}"
        default="{{old($name,$default)}}"
    ></avatar-selector>
</div>
<script src="{{ mix('/js/avatar-selector/avatar-selector.js') }}" defer></script>



