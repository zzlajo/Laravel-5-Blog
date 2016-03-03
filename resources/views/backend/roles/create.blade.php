@extends('layouts.backend')

@section('page-title')
    Create a Role
@stop

@section('breadcrumb-title')
    New Role
@stop

@section('content')
    <form role="form" action="{{ URL::route('admin.roles.store') }}" method="POST">
        {!! csrf_field() !!}
        @include('errors.formErrors')
        <div class="form-group">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Role Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="display_name" value="{{ old('display_name') }}" placeholder="Displer Role Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="description" value="{{ old('description') }}" placeholder="Descrption a Role" class="form-control">
         </div>
        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
    </form>

@stop