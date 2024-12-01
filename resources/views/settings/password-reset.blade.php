@component('mail::message')
{{__('We received a request to reset the password on your Stop Cannabis Account.')}}

<h1> {{$otp}}</h1>

{{__('Enter this code to complete the reset.')}}<br>
{{__('Thanks for helping us keep your account secure.')}}<br>

{{__('The Stop Cannabis Challenge Team')}}<br>


  <p style="text-align: center;">
        © <?php echo date('Y'); ?> <?php echo config('app.name'); ?>. <?php echo __('All rights reserved.'); ?>
    </p>
<!--© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')-->


@endcomponent