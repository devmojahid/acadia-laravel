@extends('user::pages.settings.index')

@section('settings-content')
    <div class="tpd-setting-box withdraw">

        <div class="tpd-setting-withdraw-content tpd-redio-style">
            <h5 class="tpd-setting-withdraw-title">Select a withdraw method</h5>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">
                        <span class="tpd-setting-withdraw-content-box-title">Bank Transfer</span>
                        <span class="tpd-setting-withdraw-content-box-sub">Min withdraw $20.00</span>
                        <span class="tpd-redio-style-span"></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">
                        <span class="tpd-setting-withdraw-content-box-title">E-Check</span>
                        <span class="tpd-setting-withdraw-content-box-sub">Min withdraw $40.00</span>
                        <span class="tpd-redio-style-span"></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">
                        <span class="tpd-setting-withdraw-content-box-title">PayPal</span>
                        <span class="tpd-setting-withdraw-content-box-sub">Min withdraw $30.00</span>
                        <span class="tpd-redio-style-span"></span>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tpd-setting-from">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Name</label>
                                    <input type="text" placeholder="Account Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Number</label>
                                    <input type="text" placeholder="ES19  1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Bank Name</label>
                                    <input type="text" placeholder="Bank of America">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>IBAN</label>
                                    <input type="text" placeholder="1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tpd-input">
                                    <label>BIC / SWIFT</label>
                                    <input type="text" placeholder="BIC / SWIFT">
                                </div>
                                <div class="tpd-setting-cartificate-btn">
                                    <button>Save Withdrawal Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tpd-setting-from">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Name</label>
                                    <input type="text" placeholder="Account Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Number</label>
                                    <input type="text" placeholder="ES19  1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Bank Name</label>
                                    <input type="text" placeholder="Bank of America">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>IBAN</label>
                                    <input type="text" placeholder="1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tpd-input">
                                    <label>BIC / SWIFT</label>
                                    <input type="text" placeholder="BIC / SWIFT">
                                </div>
                                <div class="tpd-setting-cartificate-btn">
                                    <button>Save Withdrawal Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="tpd-setting-from">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Name</label>
                                    <input type="text" placeholder="Account Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Account Number</label>
                                    <input type="text" placeholder="ES19  1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>Bank Name</label>
                                    <input type="text" placeholder="Bank of America">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tpd-input">
                                    <label>IBAN</label>
                                    <input type="text" placeholder="1234  5678  9087  6543">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tpd-input">
                                    <label>BIC / SWIFT</label>
                                    <input type="text" placeholder="BIC / SWIFT">
                                </div>
                                <div class="tpd-setting-cartificate-btn">
                                    <button>Save Withdrawal Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
