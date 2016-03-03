@extends('layouts.backend')

@section('page-title')
    Edit Role - {{$role->display_name}}
@stop

@section('breadcrumb-title')
    Edit Role
@stop

@section('content')
    <form role="form" action="{{ URL::route('admin.roles.update', $role->id) }}" method="POST">

        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        @include('errors.formErrors')

        <div class="form-group">
            <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control" placeholder="Role Name">
        </div>
        <div class="form-group">
            <input type="text" name="display_name" value="{{ old('display_name', $role->display_name )}}" class="form-control" placeholder="Display Role Name">
        </div>
        <div class="form-group">
            <input type="text" name="description" value="{{ old('description', $role->description) }}" class="form-control" placeholder="Role description">
        </div>
        @foreach($permissions as $permission)
            <div class="checkbox">
                <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                     @if( isset($permIds))
                         @if (array_key_exists($permission->id, $permIds) )
                            checked
                         @endif
                     @endif
                <lable>{{$permission->display_name}}</label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
    </form>

@stop