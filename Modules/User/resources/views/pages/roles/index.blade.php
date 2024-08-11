@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Roles List')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions->map(function ($permission) {
                            return $permission->name;
                        })->implode(', ') }}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary mx-2">Edit</a>
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
