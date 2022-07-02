@component('mail::message')
# @lang('Hello')

@foreach ($introLines as $line)
{{ $line }}

@endforeach

@component('mail::button', ['url' => $actionUrl])
{{$actionText}}
@endcomponent

![可愛貓咪]({{$catImage}})

@lang('Regards'),<br>
{{ config('app.name') }}
@endcomponent
