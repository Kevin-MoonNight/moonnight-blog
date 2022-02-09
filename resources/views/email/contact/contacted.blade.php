@component('mail::message')
# Introduction

感謝您註冊慕耐會員

@component('mail::button', ['url' => 'https://moonnight.me'])
前往網站
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
