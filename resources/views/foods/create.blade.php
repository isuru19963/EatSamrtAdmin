@extends('layouts.main')
@section('title', __('Create Blog'))
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10">{{ __('Badge') }}</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('blogs.index') }}">{{ __('Foods') }}</a>
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
                    <h5>{{ __('Create Food') }}</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'fooditems.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('name', __('Name'), ['class' => 'form-label']) }} *
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter food name', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description'), ['class' => 'form-label']) }} *
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter food description', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('photo', __('Image'), ['class' => 'form-label']) }} *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                 
                    <div class="form-group">
                        {{ Form::label('time', __('Categories'), ['class' => 'form-label']) }} *

                       
                           
                            <select class="form-control" name="category" value="0.00" placeholder="@lang('Click here')" required>
                                <option disabled selected>@lang('Click here')</option>
                                @foreach ($category as $option1)
                                <option value="{{ $option1['id'] }}" {{ old('category') == $option1['id'] ? 'selected' : '' }}}}>{{$option1['name']}}</option>
                                @endforeach
                            </select>
             
                    </div>

                    <div class="form-group">
                        {{ Form::label('time', __('Vendors'), ['class' => 'form-label']) }} *

                       
                           
                            <select class="form-control" name="vendor_id" value="0.00" placeholder="@lang('Click here')" required>
                                <option disabled selected>@lang('Click here')</option>
                                @foreach ($badge as $option2)
                                <option value="{{ $option2['id'] }}" {{ old('vendor_id') == $option2['id'] ? 'selected' : '' }}>{{$option2['name']}}</option>
                                @endforeach
                            </select>
             
                    </div>

                    <div class="form-group">
                        {{ Form::label('price', __('Price'), ['class' => 'form-label']) }} *
                        {!! Form::text('price', null, ['class' => 'form-control ', 'placeholder' => 'Enter food Price', 'required' => 'required']) !!}
                    </div>

                    @php
                        $optionss = ['Monday','Tuesday','Wednesday','Thursday',
                        'Friday','Saturday', 'Sunday'];
                    @endphp
                    
                   
                   <!--   <div class="form-group">
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
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
