@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Create User')
@section('content')
    <div class="col-lg-12">
        <!-- default -->
        <div class="demo-card bg-white rounded-xl mb-5">
            <div class="demo-card-header d-flex align-items-center justify-content-between px-6 py-5 ">
                <h3 class="demo-card-title m-0">Default</h3>
            </div>
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="demo-card-body">
                    <div class="demo-card-body-content">
                        <div class="mb-5">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="name@example.com" value="{{ old('email') }}">

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="johndoe"
                                value="{{ old('username') }}">

                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="Confirm Password"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option selected>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" name="bio" id="bio" rows="3">{{ old('bio') }}</textarea>
                            @error('bio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
