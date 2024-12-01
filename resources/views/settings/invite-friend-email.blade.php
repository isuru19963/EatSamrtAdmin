
@component('mail::message')
{{__('')}}

<p>{{$detail}} sent you a friend request.</p>
<p>Visit the Stop Cannabis Challenge App to process the request.</p>




@component('mail::button', ['url' => 'https://onelink.to/fmjvu9'])
    {{ __('Download Stop Cannabis') }}
@endcomponent

{{__('The Stop Cannabis Challenge Team')}}<br>



<!-- {{ config('app.name') }} -->
@endcomponent