@php
    $user = Auth::user();
@endphp

<section class="tp-dashboard-banner-wrap">
    <div class="tp-dashboard-banner-shape"><img
            src="{{ asset('frontend') }}/assets/img/dashboard/bg/dashboard-bg-shape-1.jpg" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-dashboard-banner-bg mt-30"
                    data-background="@if ($user->getMeta('cover_photo')) {{ asset($user->getMeta('cover_photo')) }}
                @else
                    {{ asset('frontend') }}/assets/img/dashboard/bg/dashboard-bg-1.jpg @endif
                ">
                    <div class="tp-instructor-wrap d-flex justify-content-between">
                        <div class="tp-instructor-info d-flex">
                            <div class="tp-instructor-avatar">
                                <div class="avatar">
                                    @if ($user->getMeta('avatar'))
                                        <img src="{{ asset($user->getMeta('avatar')) }}" alt="">
                                    @else
                                        <img src="{{ asset('frontend') }}/assets/img/dashboard/profile/dashboard-profile.jpg"
                                            alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="tp-instructor-content">
                                <h4 class="tp-instructor-title">
                                    {{ Auth::user()->name }}
                                </h4>
                                <div class="tp-instructor-rate  d-flex align-items-center">
                                    <div class="tp-instructor-rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <span>4.61</span>
                                    <span>(18 Ratings)</span>
                                </div>
                            </div>
                        </div>
                        <div class="tp-instructor-course-btn">
                            <a class="tp-btn-add-course" href="instructor-create-new-course.html"><i
                                    class="fa-regular fa-plus"></i> Create a New Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tp-dashboard-banner-wrap end -->
