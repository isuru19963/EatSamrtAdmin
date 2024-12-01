@extends('layouts.main')
@section('title', __('Create Blog'))
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10">{{ __('Foods Category') }}</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('blogs.index') }}">{{ __('Foods Category') }}</a>
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
                    <h5>{{ __('Create Foods Category') }}</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'fooditemscategory.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('name', __('Catgoery name'), ['class' => 'form-label']) }} *
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval Time in word', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Category Description'), ['class' => 'form-label']) }} *
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval time in seconds', 'required' => 'required']) !!}
                    </div>
                   
                    <div class="form-group">
                        {{ Form::label('photo', __('Photo'), ['class' => 'form-label']) }} *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                 
                    <!-- <div class="form-group">
                        {{ Form::label('slug', __('Slug'), ['class' => 'form-label']) }} *
                        {!! Form::text('slug', null, ['class' => 'form-control ', 'placeholder' => 'Enter slug', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('short_description', __('Short Description'), ['class' => 'form-label']) }} *
                        {!! Form::textarea('short_description', null, ['class' => 'form-control ', 'placeholder' => 'Enter short description', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', __('Description'), ['class' => 'form-label']) }} *
                        {!! Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' => 'Enter description', 'required' => 'required']) !!}
                    </div> -->
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('fooditemscategory.index') }}" class="btn btn-secondary ">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary ">{{ __('Save') }} </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
