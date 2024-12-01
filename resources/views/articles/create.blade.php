@extends('layouts.main')
@section('title', __('Create FAQ'))
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10">{{ __('FAQs') }}</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('blogs.index') }}">{{ __('FAQs') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Create') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Create FAQ') }}</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('article.store') }}" id="message-submit-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">@lang('Title') *</label>
                                    <textarea  name="title" id="title" class="form-control"  rows="2" ></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">@lang('keywords') *</label>
                                    <textarea  name="keywords" id="title" class="form-control"  rows="2" placeholder="@lang('smoke,cricket,exercise')"></textarea>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">@lang('Description') *</label>
                                    <textarea  name="description" rows="10" class="form-control tinymce" placeholder="@lang('Your message')" ></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">@lang('Reference') *</label>
                                    <textarea  name="reference" rows="10" class="form-control tinymce" placeholder="@lang('Your message')" ></textarea>
                                </div>

                                
                              
                            

                               
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" hidden>
                        <button type="submit" id="form_submit_btn" class="btn btn--primary btn-block">@lang('Submit')</button>
                    </div>
                </form>
                 
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary ">{{ __('Cancel') }}</a>
                        <button id="message-submit" class="btn btn-primary ">{{ __('Save') }} </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('javascript')
  <!-- Include the Quill library -->
<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->

<script>

        'use strict';
        $(document).ready(function () {
            $("#message-submit").click(function (e) {
                e.preventDefault();
                var validFunction = true;
                if (validFunction) {
                    $('#form_submit_btn').trigger('click');
                }
            });
        });
</script>
@endpush
