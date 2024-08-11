@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Create Role')
@section('content')
    <div class="col-lg-12">
        <!-- default -->
        <div class="demo-card bg-white rounded-xl mb-5">
            <div class="demo-card-header d-flex align-items-center justify-content-between px-6 py-5 ">
                <h3 class="demo-card-title m-0">Default</h3>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="demo-card-body">
                    <div class="demo-card-body-content">
                        <div class="mb-5">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Manager"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row mt-3">
                            <label for="permisson" class="col-sm-2 col-form-label">Permissons <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @foreach ($permissions as $permission)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            id="permission-{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label"
                                            for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permissons')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
