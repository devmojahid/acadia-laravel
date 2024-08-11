@extends('user::layouts.guest')

@section('content')
    <div class="tp-login-from-box">
        <div class="tp-login-from-heading text-center">
            <h4 class="tp-login-from-title">
                {{ __('Verify Your Email Address') }}
            </h4>
            <p> {{ __('Back to register?') }} <a href="{{ route('register') }}"> {{ __('Register Now') }}</a></p>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="tp-login-input-form">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="tp-login-from-btn">
                            <button class="tp-btn-inner w-100 text-center">{{ __('Resend Verification Email') }}</button>
                        </div>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="tp-login-from-btn">
                            <button class="tp-btn-inner w-100 text-center">{{ __('Log Out') }}</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
