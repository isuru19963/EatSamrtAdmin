@php
$currency = tenancy()->central(function ($tenant) {
    return Utility::getsettings('currency_symbol');
});
@endphp
@section('title')
    {{ __('Home') }}
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ \App\Facades\UtilityFacades::getsettings('rtl') == '1' ? 'rtl' : '' }}">

    @include('layouts.front_header')
    <!-- [ Nav ] start -->


    <header id="home" class="bg-primary">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-5">
                    <h1 class="text-white mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        {{ Utility::getsettings('app_name') }}
                    </h1>

                    <h2 class="text-white mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        {{ __('Stop cannabis for Laravel') }}<br />
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        {{__('A flexible multi-tenancy package for Laravel. Single & multi-database tenancy, automatic & manual
                        mode, event-based architecture. Integrates perfectly with other packages.')}}
                    </p>
                </div>
                <div class="col-sm-5">
                    <img src="{{ asset('assets/images/front/header-mokeup.svg') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
        </div>
    </header>
    <!-- [ Header ] End -->
    <!-- [ dashboard ] start -->
    <!-- <section class="">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        {{ __('Dashboard') }}
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        {{__("All in one place")}} <br />{{ __("CRM system") }}
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        {{__('these awesome forms to login or create new account in your
                        project for free.')}}
                    </p>
                
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('vendor/img/dashboard.png')}}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/front/img-crm-dash-2.svg')}}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        {{ __('Dashboard') }}
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        {{ __('All in one place') }} <br />{{ __('CRM system') }}
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        {{__('These awesome forms to login or create new account in your
                        project for free.')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    @if (tenant('id') != null)
    <section id="feature" class="feature" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2>
                        <span class="d-block mb-3">{{ __('Posts') }}</span>
                    </h2>
                    <p class="m-0">
                        {{__('These awesome forms to login or create new account in your
                        project for free.')}}
                    </p>
                </div>
            </div>

            <div class="row all_posts">
             @foreach ($posts as $post)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="img-fluid card-img-top card-img-custom"
                        src="{{ Storage::url(tenant('id') . '/' . $post->photo) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ substr($post->short_description, 0, 75) . (strlen($post->short_description) > 75 ? '...' : '') }}
                        </p>
                        <a href="{{ route('post.details', $post->slug) }}">{{ __('Read More') }} <i
                                class="ti ti-chevron-right"></i></a>
                    </div>
                </div>
            </div>
             @endforeach
            </div>

           
        </div>
    </section>
    @endif
    <!-- [ feature ] End -->
    <!-- [ dashboard ] start -->
    -->



</body>
</html>
