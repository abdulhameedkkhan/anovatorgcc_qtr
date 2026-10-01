<?php
$root = __DIR__.'/../public/images';
$files = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $f) {
    if ($f->isFile()) {
        $files[] = [$f->getSize(), str_replace('\\', '/', substr($f->getPathname(), strlen(realpath($root)) + 1))];
    }
}
usort($files, fn ($a, $b) => $b[0] <=> $a[0]);
$sum = array_sum(array_column($files, 0));
echo 'totalMB='.round($sum / 1048576, 1).' files='.count($files).PHP_EOL;
foreach (array_slice($files, 0, 20) as [$s, $p]) {
    echo str_pad((string) round($s / 1024).'KB', 8).' '.$p.PHP_EOL;
}
