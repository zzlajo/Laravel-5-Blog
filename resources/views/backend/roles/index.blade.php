@extends('layouts.backend')

@section('page-title')
    Roles
@stop

@section('breadcrumb-title')
    Roles
@stop

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
        </thead>
        @forelse($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    @foreach($role->perms as $perm)
                        {{$perm->name}}/
                    @endforeach
                </td>
                <td><a href="{{ URL::route('admin.roles.edit', $role->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{ URL::route('admin.roles.destroy', $role->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Role found.</td>
            </tr>
        @endforelse
    </table>

@stop