<?php

class ImageService
{
    static public function createThumbnail($file, $path, $extension)
    {
        $createFunction = "imagecreatefrom" . $extension;
        $image = $createFunction($file);

        $thumbnail = imagescale($image, 200, 125);

        imagedestroy($image);
        imagepng($thumbnail, $path);
    }

    static public function createWatermark($file, $path, $extension, $text)
    {
        $createFunction = "imagecreatefrom" . $extension;
        $image = $createFunction($file);
        $fontColor = imagecolorallocate($image, 0x64, 0x64, 0x64);
        $fontFilename = '../../VT323-Regular.ttf';

        imagettftext($image, 40, -45, 75, 75, $fontColor, $fontFilename, $text);
        imagepng($image, $path);
        imagedestroy($image);
    }
}