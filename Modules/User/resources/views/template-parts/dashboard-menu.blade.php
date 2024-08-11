@php
    $sidebarItems = [
        [
            'name' => 'Dashboard',
            'route' => 'student.dashboard',
            'icon' => 'dashboard',
            'permissions' => 'student_das',
            'beforeMenu' => '<li class="tp-user-menu-title">Welcome</li>',
        ],
        [
            'name' => 'My Profile',
            'route' => 'student.profile.show',
            'icon' => 'profile',
            'permission' => 'edit instructor profile',
        ],
        [
            'name' => 'Settings',
            'route' => 'student.profile.edit',
            'icon' => 'settings',
            'permission' => 'edit instructor profile',
            'multipleRoutes' => true,
        ],
    ];

@endphp

<div class="tpd-user-sidebar">
    <div class="tp-user-wrap">
        <div class="tp-user-menu">
            <nav>
                <ul>
                    @foreach ($sidebarItems as $item)
                        @php
                            $activeClass = '';
                            if (isset($item['multipleRoutes'])) {
                                $activeClass =
                                    request()->is('student/settings/profile') ||
                                    request()->is('student/settings/profile/*')
                                        ? 'active'
                                        : '';
                            } else {
                                $activeClass = request()->routeIs($item['route']) ? 'active' : '';
                            }
                        @endphp


                        {{-- @if (isset($item['permission']) &&
    auth()->user()->can($item['permission'])) --}}
                        @if (isset($item['beforeMenu']))
                            {!! $item['beforeMenu'] !!}
                        @endif
                        <li>
                            <a href="{{ route($item['route']) }}" class="{{ $activeClass }}">
                                <span>
                                    @include('user::components.icons.' . $item['icon'])
                                </span>
                                {{ $item['name'] }}
                            </a>
                        </li>
                        {{-- @endif --}}
                    @endforeach
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <span>
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M9.94863 0C10.3714 0 10.7222 0.341829 10.7222 0.773613V17.2264C10.7222 17.6492 10.3804 18 9.94863 18C4.65028 18 0.953125 14.3028 0.953125 9.0045C0.953125 3.70615 4.65927 0 9.94863 0Z"
                                            fill="currentColor" />
                                        <path
                                            d="M16.5143 8.58188L13.9596 6.01816C13.6987 5.75729 13.2669 5.75729 13.006 6.01816C12.7452 6.27903 12.7452 6.71082 13.006 6.97169L14.4093 8.37498H5.80064C5.43182 8.37498 5.12598 8.68083 5.12598 9.04965C5.12598 9.41846 5.43182 9.72431 5.80064 9.72431H14.4093L13.006 11.1276C12.7452 11.3885 12.7452 11.8203 13.006 12.0811C13.141 12.2161 13.3119 12.279 13.4828 12.279C13.6537 12.279 13.8246 12.2161 13.9596 12.0811L16.5143 9.51741C16.7752 9.26554 16.7752 8.84275 16.5143 8.58188Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="tp-user-banner d-flex align-items-center">
            <div class="tp-user-banner-text">
                <h4 class="tp-user-banner-title">Online Education</h4>
                <div class="tp-user-banner-btn">
                    <a class="tp-btn-course" href="instructor-my-course.html">View
                        Course</a>
                </div>
            </div>
            <div class="tp-user-banner-shape">
                <img src="{{ asset('frontend') }}/assets/img/dashboard/icon/menu/menu-shape.png" alt="">
            </div>
        </div>
    </div>
</div>
