@extends('user::layouts.guest')

@section('content')
    <div class="tp-login-from-box">
        <div class="tp-login-from-heading text-center">
            <h4 class="tp-login-from-title">
                {{ __('Forgot password') }}
            </h4>
            <p> {{ __('Back to login?') }} <a href="{{ route('login') }}"> {{ __('Login Now') }}</a></p>
        </div>
        <div class="tp-login-input-form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="tp-login-input p-relative">
                            <x-user::input-label for="email" :value="__('Email or Phone')" />
                            <x-user::text-input id="email" type="email" name="email" :value="old('email')"
                                autocomplete="email" placeholder="{{ __('Type your email or phone number') }}"
                                class="is-invalid" />
                            <x-user::input-error :messages="$errors->get('email')" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tp-login-from-btn">
                            <button class="tp-btn-inner w-100 text-center">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
