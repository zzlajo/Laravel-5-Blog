@extends('layouts.backend')

@section('page-title')
    Editing User "{{ $userB->name }}"
@stop

@section('breadcrumb-title')
    Edit User
@stop

@section('content')

    <form role="form" action="{{ URL::route('admin.users.update', $userB->id) }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">

        @include('errors.formErrors')

        <div class="form-group">
            <input type="text" name="name" placeholder="Name" value="{{ old('name', $userB->name) }}" class="form-control">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" value="{{ $userB->email }}" class="form-control" disabled="disabled">
            <input type="hidden" name="email" value="{{ $userB->email }}">
        </div>
        <div class="form-group">
            <input type="text" name="avatar" placeholder="Avatar" value="{{ old('avatar', $userB->avatar) }}" class="form-control">
        </div>
        @foreach($roles as $role)
            <div class="checkbox">
                <label><input type="checkbox" name="roles[]" value="{{$role->id}}"
                    @if(isset($rolesId))
                        @if (array_key_exists($role->id, $rolesId))
                            checked
                        @endif
                    @endif
                >{{$role->display_name}}</label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
    </form>
@stop
