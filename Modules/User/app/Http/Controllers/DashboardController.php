<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function student()
    {
        return view('user::dashboards.student');
    }

    public function instructor()
    {
        return view('user::dashboards.instructor');
    }

    public function admin()
    {
        return view('user::dashboards.backend');
    }
}
