<?php

class ImageService
{
    static public function generateThumbnail($file, $path, $format)
    {
        $create = "imagecreatefrom{$format}";
        $img = $create($file);
        $thumb = imagescale($img, 200, 125);
        imagedestroy($img);
        imagepng($thumb, $path);
    }

    static public function generateWatermark($file, $path, $format, $text)
    {
        $create = "imagecreatefrom{$format}";
        $img = $create($file);
        $color = imagecolorallocate($img, 0x0, 0x0, 0x0);
        $x = 50;
        $y = imagesy($img) - 50;
        imagettftext($img, 20, 45, $x, $y, $color, '../VT323-Regular.ttf', $text);
        imagepng($img, $path);
        imagedestroy($img);
    }
}