<?php
$root = realpath(__DIR__.'/../public/images');
$files = [
    'photos/hero-3.jpg',
    'photos/mega-products.jpg',
    'photos/news-2.jpg',
    'slider/slide-1.jpg',
    'photos/hero-1.jpg',
    'photos/tile-clinic.jpg',
    'photos/map.png',
    'slider/slide-4.jpg',
];
ini_set('memory_limit', '512M');
foreach ($files as $rel) {
    $path = $root.'/'.$rel;
    if (! is_file($path)) continue;
    $before = filesize($path);
    $info = getimagesize($path);
    [$w, $h, $type] = $info;
    $max = 1200;
    $newW = $w > $max ? $max : $w;
    $newH = (int) round($h * ($newW / $w));
    if ($type === IMAGETYPE_JPEG) {
        $src = imagecreatefromjpeg($path);
        $dst = imagecreatetruecolor($newW, $newH);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
        imagejpeg($dst, $path, 68);
    } elseif ($type === IMAGETYPE_PNG) {
        $src = imagecreatefrompng($path);
        $dst = imagecreatetruecolor($newW, $newH);
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
        imagepng($dst, $path, 7);
    } else {
        continue;
    }
    imagedestroy($src);
    imagedestroy($dst);
    clearstatcache(true, $path);
    echo sprintf("%s %dKB -> %dKB\n", $rel, round($before/1024), round(filesize($path)/1024));
}
