@extends('layouts.main')
@section('title', __('Edit Blog'))
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10">{{ __('Edit Badge') }}</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('badge.index') }}">{{ __('Badge') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ __('Edit') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Edit Badge') }}</h5>
                </div>
                <div class="card-body">
                    {!! Form::model($badge, ['route' => ['badge.update', $badge->id], 'method' => 'Patch', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('interval_time', __('Interval time'), ['class' => 'col-form-label']) }} *

                        {!! Form::text('interval_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval time', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('photo', __('Photo'), ['class' => 'col-form-label']) }} *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Deactive'], $badge->status, ['class' => 'form-select']) !!}
                    </div>
                
                
                 
                   
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary ">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary ">{{ __('Save') }} </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
