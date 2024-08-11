@extends('user::layouts.master')

@section('content')
    <div class="tpd-content-layout">

        <div class="tp-profile-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-dashboard-section">
                        <h2 class="tp-dashboard-title">My Profile</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tp-profile-box">
                        <div class="tp-profile-wrap">
                            <ul>
                                @if ($user)
                                    <x-user::profile-info label="{{ __('Registration Date') }}" :value="$user->created_at->format('F d, Y h:i a')" />
                                    <x-user::profile-info label="{{ __('Full Name') }}" :value="$user->name" />
                                    <x-user::profile-info label="{{ __('Phone Number') }}" :value="$user->getMeta('phone')" />
                                    <x-user::profile-info label="{{ __('Username') }}" :value="$user->username" />
                                    <x-user::profile-info label="{{ __('Email') }}" :value="$user->email" />
                                    <x-user::profile-info label="{{ __('Skill/Occupation') }}" :value="$user->getMeta('skill')" />
                                    <x-user::profile-info label="{{ __('Biography') }}" :value="$user->getMeta('bio')" />
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
