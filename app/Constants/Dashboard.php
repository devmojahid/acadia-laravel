<?php

namespace App\Constants;

class Dashboard
{
    public const STUDENT = 'student.dashboard';
    public const INSTRUCTOR = 'instructor.dashboard';
    public const ADMIN = 'admin.dashboard';

    public const STUDENT_NAME = 'student';
    public const INSTRUCTOR_NAME = 'instructor';
    public const ADMIN_NAME = 'admin';

    public static function getStudentPrefix(): string
    {
        return get_config('student_prefix', 'student');
    }

    public static function getInstructorPrefix(): string
    {
        return get_config('instructor_prefix', 'instructor');
    }

    public static function getAdminPrefix(): string
    {
        return get_config('admin_prefix', 'admin');
    }
}
