@extends('layouts.backend')

@section('page-title')
    Edit permission - "{{$permission->name}}"
@stop

@section('breadcrumb-title')
    Edit permission
@stop

@section('content')
    <form role="form" action="{{ URL::route('admin.permissions.update', $permission->id) }}" method="POST">

        @include('errors.formErrors')

        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" value="{{ old('name', $permission->name) }}" placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="display_name" value="{{ old('display_name', $permission->display_name) }}" placeholder="Display name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="description" value="{{ old('description', $permission->description) }}" placeholder="Descrption Permission" class="form-control">
        </div>
        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
    </form>
@stop