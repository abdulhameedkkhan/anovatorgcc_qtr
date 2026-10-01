<?php

$root = realpath(__DIR__.'/../public/images');
ini_set('memory_limit', '512M');

$map = [
    'products/p5/1.png' => 800,
    'products/m2-pro/1.png' => 800,
    'blog/internal-indicators-external-measurements-posture-assessment.png' => 1200,
    'home/a5/gallery-3.png' => 1000,
    'home/a5/home-a5.png' => 1000,
    'slider/slide-a5.png' => 1000,
    'slider/slide-a5-portrait.png' => 900,
];

foreach ($map as $rel => $max) {
    $png = $root.'/'.$rel;
    if (! is_file($png)) {
        echo "missing {$rel}\n";
        continue;
    }
    $src = @imagecreatefrompng($png);
    if (! $src) {
        echo "decode fail {$rel}\n";
        continue;
    }
    $w = imagesx($src);
    $h = imagesy($src);
    $newW = $w > $max ? $max : $w;
    $newH = max(1, (int) round($h * ($newW / $w)));
    $dst = imagecreatetruecolor($newW, $newH);
    imagefilledrectangle($dst, 0, 0, $newW, $newH, imagecolorallocate($dst, 255, 255, 255));
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
    $jpg = preg_replace('/\.png$/i', '.jpg', $png);
    imagejpeg($dst, $jpg, 76);
    imagedestroy($src);
    imagedestroy($dst);
    $before = filesize($png);
    $after = filesize($jpg);
    echo sprintf(
        "jpg %s  png %dKB -> jpg %dKB\n",
        $rel,
        (int) round($before / 1024),
        (int) round($after / 1024)
    );
    // Remove heavy PNG once JPG exists
    unlink($png);
}
