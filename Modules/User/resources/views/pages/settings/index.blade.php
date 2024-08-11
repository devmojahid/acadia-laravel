@extends('user::layouts.master')

@php
    $sidebarItems = [
        [
            'name' => 'Profile',
            'route' => 'student.profile.edit',
            'permission' => 'edit instructor profile',
        ],
        [
            'name' => 'Change Password',
            'route' => 'student.profile.change-password',
            'permission' => 'edit instructor profile',
        ],
        [
            'name' => 'Withdraw',
            'route' => 'student.profile.withdraw',
            'permission' => 'edit instructor profile',
        ],
        [
            'name' => 'Social Profiles',
            'route' => 'student.profile.social',
            'permission' => 'edit instructor profile',
        ],
    ];

@endphp

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- validtion --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="tpd-course-area">
        <div class="row">
            <div class="col-12">
                <div class="tp-dashboard-tab mb-25">
                    <h2 class="tp-dashboard-tab-title">Settings</h2>
                    <div class="tp-dashboard-tab-list">
                        <ul>
                            @foreach ($sidebarItems as $item)
                                {{-- @if (isset($item['permission']) &&
    auth()->user()->can($item['permission'])) --}}
                                <li>
                                    <a href="{{ route($item['route']) }}"
                                        class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
                                        {{ $item['name'] }}
                                    </a>
                                </li>
                                {{-- @endif --}}
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @yield('settings-content')
            </div>
        </div>
    </div>
@endsection
