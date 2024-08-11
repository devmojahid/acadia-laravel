@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Plugins')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Path</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plugins as $plugin)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $plugin->getName() }}</td>
                    <td>{{ $plugin->getPath() }}</td>
                    <td>
                        <div class="d-flex">
                            @if ($plugin->isEnabled())
                                <form action="{{ route('admin.plugins.deactivate', $plugin->getName()) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info mx-2">Deactivate</button>
                                </form>
                            @else
                                <form action="{{ route('admin.plugins.activate', $plugin->getName()) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success mx-2">Activate</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.plugins.delete', $plugin->getName()) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No Plugins found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
