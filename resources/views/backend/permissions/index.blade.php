@extends('layouts.backend');

@section('page-title')
    Permissions List
@stop

@section('breadcrumb-title')
    Permissions
@stop

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        @forelse($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->display_name }}</td>
                <td>{{ $permission->description }}</td>
                <td><a href="{{ URL::route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="{{ URL::route('admin.permissions.destroy', $permission->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Permission found.</td>
            </tr>
        @endforelse
    </table>
@stop