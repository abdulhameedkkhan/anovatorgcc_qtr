<?php

/**
 * Aggressive image optimization for faster page loads.
 * - Photos / JPG: max 1400px wide, quality 72
 * - Sector logos / small UI PNGs: max 256px
 * - Product PNGs: max 900px (still look sharp in cards)
 */

$root = realpath(__DIR__.'/../public/images');
if (! $root) {
    fwrite(STDERR, "images folder missing\n");
    exit(1);
}

ini_set('memory_limit', '512M');

$rules = [
    'home/sector-logos' => ['max' => 256, 'q' => 80, 'png' => 7],
    'blog' => ['max' => 1400, 'q' => 72, 'png' => 6],
    'photos' => ['max' => 1400, 'q' => 72, 'png' => 6],
    'slider' => ['max' => 1400, 'q' => 72, 'png' => 6],
    'faq' => ['max' => 1200, 'q' => 75, 'png' => 6],
    'products' => ['max' => 900, 'q' => 78, 'png' => 6],
    'home' => ['max' => 1200, 'q' => 75, 'png' => 6],
    'certified' => ['max' => 320, 'q' => 80, 'png' => 7],
    'default' => ['max' => 1400, 'q' => 74, 'png' => 6],
];

$count = 0;
$saved = 0;

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if (! $file->isFile()) {
        continue;
    }

    $ext = strtolower($file->getExtension());
    if (! in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
        continue;
    }

    $path = $file->getPathname();
    $rel = str_replace('\\', '/', substr($path, strlen($root) + 1));
    $before = filesize($path);

    $rule = $rules['default'];
    foreach ($rules as $prefix => $candidate) {
        if ($prefix === 'default') {
            continue;
        }
        if (str_starts_with($rel, $prefix.'/')) {
            $rule = $candidate;
            break;
        }
    }

    // Skip tiny files
    if ($before < 40 * 1024) {
        continue;
    }

    $info = @getimagesize($path);
    if (! $info) {
        echo "skip (unreadable): {$rel}\n";
        continue;
    }

    [$w, $h] = $info;
    $type = $info[2];
    if ($type !== IMAGETYPE_JPEG && $type !== IMAGETYPE_PNG) {
        continue;
    }

    $needsResize = $w > $rule['max'];
    $needsRecompress = $before > 90 * 1024;
    if (! $needsResize && ! $needsRecompress) {
        continue;
    }

    if ($type === IMAGETYPE_JPEG) {
        $src = @imagecreatefromjpeg($path);
    } else {
        $src = @imagecreatefrompng($path);
    }
    if (! $src) {
        echo "skip (decode fail): {$rel}\n";
        continue;
    }

    $newW = $w;
    $newH = $h;
    if ($needsResize) {
        $newW = $rule['max'];
        $newH = max(1, (int) round($h * ($rule['max'] / $w)));
    }

    $dst = imagecreatetruecolor($newW, $newH);
    if ($type === IMAGETYPE_PNG) {
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
        imagefilledrectangle($dst, 0, 0, $newW, $newH, $transparent);
        imagealphablending($dst, true);
    } else {
        $white = imagecolorallocate($dst, 255, 255, 255);
        imagefilledrectangle($dst, 0, 0, $newW, $newH, $white);
    }

    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
    if ($type === IMAGETYPE_PNG) {
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
    }

    $tmp = $path.'.opt';
    $ok = $type === IMAGETYPE_JPEG
        ? imagejpeg($dst, $tmp, $rule['q'])
        : imagepng($dst, $tmp, $rule['png']);

    imagedestroy($src);
    imagedestroy($dst);

    if (! $ok || ! is_file($tmp)) {
        @unlink($tmp);
        echo "skip (encode fail): {$rel}\n";
        continue;
    }

    $after = filesize($tmp);
    if ($after > 0 && $after < $before * 0.98) {
        rename($tmp, $path);
        $count++;
        $saved += ($before - $after);
        echo sprintf(
            "OK %s  %dKB -> %dKB  (%dx%d -> %dx%d)\n",
            $rel,
            (int) round($before / 1024),
            (int) round($after / 1024),
            $w,
            $h,
            $newW,
            $newH
        );
    } else {
        unlink($tmp);
        echo "keep {$rel} (no gain)\n";
    }
}

echo "done: {$count} files, saved ".round($saved / 1048576, 2)." MB\n";
