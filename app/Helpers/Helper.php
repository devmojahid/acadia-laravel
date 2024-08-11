<?php

use App\Contracts\ConfigContract;

if (!function_exists('get_config')) {
    function get_config(string $key, mixed $default = null): mixed
    {
        return app(ConfigContract::class)->getConfig($key, $default);
    }
}

if (!function_exists('set_config')) {
    function set_config(string $key, mixed $value): void
    {
        app(ConfigContract::class)->setConfig($key, $value);
    }
}


if (!function_exists('redirectToRoleDashboard')) {
    function redirectToRoleDashboard($role)
    {
        $roleRoutes = [
            'student' => 'student.dashboard',
            'admin' => 'admin.dashboard',
            'teacher' => 'teacher.dashboard',
            // Add more roles here
        ];

        $routeName = $roleRoutes[$role] ?? 'student.dashboard';
        return redirect()->intended(route($routeName, absolute: false));
    }
}
