@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Pages')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">
                    Title
                </th>
                <th scope="col">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pages as $page)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $page->title }}</td>
                    <td>
                        <a href="{{ route('page.show', $page->slug) }}" class="btn btn-primary mx-2" target="_blank">View</a>
                        {{-- <div class="d-flex">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div> --}}

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
