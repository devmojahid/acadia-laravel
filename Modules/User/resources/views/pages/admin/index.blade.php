@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Users')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">
                    Name
                </th>
                <th scope="col">
                    Email
                </th>
                <th scope="col">
                    Username
                </th>
                <th scope="col">
                    Role
                </th>
                <th scope="col">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->roles->map(function ($role) {
                            return $role->name;
                        })->implode(', ') }}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary mx-2">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
