@extends('user::pages.settings.index')

@section('settings-content')
    <div class="tpd-setting-box">
        <form action="{{ route('student.profile.update-password') }}" method="POST">
            @csrf
            <div class="tpd-setting-password-content">
                <div class="col-lg-8">
                    <div class="tpd-input">
                        <label>Current Password</label>
                        <input type="text" placeholder="Current Password" name="current_password" required>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tpd-input">
                        <label>New Password</label>
                        <input type="text" placeholder="New Password" name="password" required>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tpd-input">
                        <label>Re-type New Password</label>
                        <input type="text" placeholder="Re-type New Password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tpd-setting-btn">
                        <button type="submit">Set New Password</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
