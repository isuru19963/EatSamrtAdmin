@php
use Carbon\Carbon;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
@endphp
@extends('layouts.main')
@section('title', __(' User Stats Summary'))
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/dist/jqvmap.min.css') }}">
@endpush
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10">{{ __(' User Stats Summary') }}</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="section-header-breadcrumb"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-6 col-12">
           
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-b-20 text-muted">{{ __('New Users Since Last week') }}</h5>
                                    <h3 class="">{{ $user }}</h3>
                                </div>
                                &nbsp
                                <div class="col-auto">
                                    <i class="ti ti-user bg-primary text-white text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>

            <div class="col-xl-6 col-6">
            

                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted">{{ __('Total Users') }}</h6>
                                    <h3 class="">{{ $total_user }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-users bg-primary text-white text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
  
            </div>

        </div>



        <div class="row">
                <div class="col-xl-6 col-6">
                    
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted">{{ __('Users on Android') }}</h6>
                                    <h3 class="">{{  $android_users }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-currency-dollar bg-warning text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-xl-6 col-6">
            

            <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted">{{ __('Users on iOS') }}</h6>
                                    <h3 class="">{{ $ios_users }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-shield-check bg-warning text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
  
            </div>

        </div>



        
    </div>

    <div class="col-auto" hidden>
    {{ $plan }}
                                </div>





@endsection
@push('javascript')

   
@endpush
