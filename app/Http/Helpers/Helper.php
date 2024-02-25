<?php
/**
 * Useful functions through out the application
 *
 * @category PHP
 * @author Aaron Low <aaronlow1220@gmail.com>
 * @copyright 2024 Aaron
 *
 */

namespace App\Http\Helpers;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use App\Models\wn_user;

class Helper
{
    // User
    /**
     * Generate uuid with custom prefix
     *
     * @param string $prefix prefix for generated uuid
     *
     * @return string
     */
    public static function prefixedUuid($prefix)
    {
        return $prefix . ((string) Uuid::uuid4());
    }

    /**
     * Generate uuid with custom prefix
     *
     * @return bool
     */
    public static function isAdmin()
    {
        $isAdmin = false;
        if (Auth::check()) {
            $isAdmin = wn_user::where("uuid", Auth::user()->uuid)->first()->is_admin;
        }
        return $isAdmin;
    }

    // Image Processing
    public static function resize_jpg($source, $destination)
    {
        $size = getimagesize($source);
        $width = $size[0];
        $height = $size[1];

        $resize = 0.8;
        $rwidth = ceil($width * $resize);
        $rheight = ceil($height * $resize);

        $original = imagecreatefromjpeg($source);

        $resized = imagecreatetruecolor($rwidth, $rheight);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);

        imagejpeg($resized, $destination);

        imagedestroy($original);
        imagedestroy($resized);
    }

    public static function resize_png($source, $destination)
    {
        $size = getimagesize($source);
        $width = $size[0];
        $height = $size[1];

        $resize = 0.8;
        $rwidth = ceil($width * $resize);
        $rheight = ceil($height * $resize);

        $original = imagecreatefrompng($source);

        $resized = imagecreatetruecolor($rwidth, $rheight);
        imagealphablending($resized, false);
        imagesavealpha($resized, true);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, $rwidth, $rheight, $width, $height);

        imagepng($resized, $destination);

        imagedestroy($original);
        imagedestroy($resized);
    }

    public static function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}