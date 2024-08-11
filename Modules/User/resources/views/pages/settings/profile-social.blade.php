@extends('user::pages.settings.index')

@section('settings-content')
    <div class="tpd-setting-box">
        <h3 class="tpd-setting-social-title">Social Profile Link</h3>
        <form action="{{ route('student.profile.social.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="tpd-setting-social-content">
                <div class="tpd-setting-social-wrap d-flex align-items-center">
                    <div class="tpd-setting-social-icon d-flex align-items-center">
                        <img src="assets/img/dashboard/icon/facebook.png" alt="">
                        <h4>Facebook <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L5 5L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span></h4>
                    </div>
                    <div class="tpd-setting-social-input">
                        <div class="tpd-input">
                            <input placeholder="https://facebook.com/username" value="{{ $user->getMeta('facebook') }}"
                                name="facebook" type="url">
                        </div>
                    </div>
                </div>
                <div class="tpd-setting-social-wrap
                                d-flex align-items-center">
                    <div class="tpd-setting-social-icon d-flex align-items-center">
                        <img src="assets/img/dashboard/icon/twetter.png" alt="">
                        <h4>Twitter <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L5 5L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span></h4>
                    </div>
                    <div class="tpd-setting-social-input">
                        <div class="tpd-input">
                            <input placeholder="https://twitter.com/username" value="{{ $user->getMeta('twitter') }}"
                                name="twitter" type="url">
                        </div>
                    </div>
                </div>
                <div class="tpd-setting-social-wrap d-flex align-items-center">
                    <div class="tpd-setting-social-icon d-flex align-items-center">
                        <img src="assets/img/dashboard/icon/linkdin.png" alt="">
                        <h4>Linkedin <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L5 5L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span></h4>
                    </div>
                    <div class="tpd-setting-social-input">
                        <div class="tpd-input">
                            <input placeholder="https://linkedin.com/username" name="linkedin"
                                value="{{ $user->getMeta('linkedin') }}" type="url">
                        </div>
                    </div>
                </div>
                <div class="tpd-setting-social-wrap d-flex align-items-center">
                    <div class="tpd-setting-social-icon d-flex align-items-center">
                        <img src="assets/img/dashboard/icon/website.png" alt="">
                        <h4>Website <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L5 5L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span></h4>
                    </div>
                    <div class="tpd-setting-social-input">
                        <div class="tpd-input">
                            <input placeholder="https://example.com/" name="website" value="{{ $user->getMeta('website') }}"
                                type="url">
                        </div>
                    </div>
                </div>
                <div class="tpd-setting-social-wrap d-flex align-items-center">
                    <div class="tpd-setting-social-icon d-flex align-items-center">
                        <img src="assets/img/dashboard/icon/git.png" alt="">
                        <h4>Github <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L5 5L1 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span></h4>
                    </div>
                    <div class="tpd-setting-social-input">
                        <div class="tpd-input">
                            <input placeholder="https://github.com/username" name="github"
                                value="{{ $user->getMeta('github') }}" type="url">
                        </div>
                    </div>
                </div>
                <div class="tpd-setting-btn">
                    <button>Update Profile</button>
                </div>
            </div>
        </form>
    </div>
@endsection
