<?php

use Modules\User\Models\UserMeta;

if (!function_exists('get_user_meta')) {
    function get_user_meta($userId, $key)
    {
        return UserMeta::getMeta($userId, $key);
    }
}

if (!function_exists('get_user_meta_all')) {
    function get_user_meta_all($userId)
    {
        return UserMeta::getMetaAll($userId);
    }
}

if (!function_exists('update_user_meta')) {
    function update_user_meta($userId, $key, $value)
    {
        return UserMeta::setMeta($userId, $key, $value);
    }
}

if (!function_exists('delete_user_meta')) {
    function delete_user_meta($userId, $key)
    {
        return UserMeta::deleteMeta($userId, $key);
    }
}

if (!function_exists('get_initial_name')) {
    function get_initial_name($name)
    {
        $name = explode(' ', $name);
        if (count($name) > 1) {
            return strtoupper($name[0][0] . $name[1][0]);
        } else {
            return strtoupper(substr($name[0], 0, 2));
        }
    }
}

if (!function_exists('create_default_avater')) {
    function create_default_avater($initial)
    {
        $width = 100;
        $height = 100;
        $fontSize = 40;
        $font = public_path('frontend/assets/fonts/fa-brands-400.ttf');

        $image = imagecreatetruecolor($width, $height);

        // Directory where avatars will be saved
        $directory = public_path('avatars');

        // Check if the directory exists, if not create it
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // set background color
        $background = imagecolorallocate($image, 221, 221, 221); //#ddd
        imagefilledrectangle($image, 0, 0, $width, $height, $background);

        // set text color
        $textColor = imagecolorallocate($image, 255, 255, 255); //#fff

        //calculate the position of the text
        $bbox = imagettfbbox($fontSize, 0, $font, $initial);

        $x = ($width - ($bbox[2] - $bbox[0])) / 2;
        $y = ($height - ($bbox[1] - $bbox[7])) / 2;
        $y += $fontSize / 2;

        // add text to image

        imagettftext($image, $fontSize, 0, $x, $y, $textColor, $font, $initial);

        // save the image
        $path = 'avatars/default_' . strtolower($initial) . '.png';
        imagepng($image, public_path($path));
        imagedestroy($image);

        return $path;
    }
}
