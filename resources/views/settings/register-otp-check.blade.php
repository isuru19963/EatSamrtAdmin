@component('mail::message')
{{__('To continue the registration process, please enter the below OTP')}}

<h1> {{$otp}}</h1>

{{__('Enter this code to complete the registration.')}}<br>
{{__('Thanks for joining with us.')}}<br>

{{__('The Stop Cannabis Challenge Team')}}<br>



<!-- {{ config('app.name') }} -->
@endcomponent