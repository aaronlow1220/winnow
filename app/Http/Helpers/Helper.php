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
    public static function pngToJpg($originalFile, $outputFile, $quality)
    {
        // $image = imagecreatefrompng($originalFile);
        // imagejpeg($image, $outputFile, $quality);
        // imagedestroy($image);

        $image = imagecreatefrompng($originalFile);
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        imagejpeg($bg, $outputFile, $quality);
        imagedestroy($bg);
    }

    public static function compressJpg($originalFile, $outputFile, $quality){
        $image = imagecreatefromjpeg($originalFile);
        imagejpeg($image, $outputFile, $quality);
        imagedestroy($bg);
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