@extends('layouts.backend')

@section('page-title')
    Create a Permission
@stop

@section('breadcrumb-title')
    New Permission
@stop

@section('content')
    <form role="form" action="{{ URL::route('admin.permissions.store') }}" method="POST">
        {!! csrf_field() !!}
        @include('errors.formErrors')
        <div class="form-group">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Permission Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="display_name" value="{{ old('display_name') }}" placeholder="Display Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="description" value="{{ old('description') }}" placeholder="Description a Permission" class="form-control">
        </div>
        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
    </form>
@stop