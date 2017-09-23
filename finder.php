#!/usr/bin/env php
<?php
$it = new DirectoryIterator(__DIR__ . '/zip/data/js/tweets');
foreach ($it as $file) {
    $path = $file->getPathname();
    if (!preg_match('/\.js$/', $path)) {
        continue;
    }
    $fh = fopen($path, 'r');
    fgets($fh);
    $data = json_decode(rtrim(stream_get_contents($fh), ';'));

    foreach ($data as $tweet) {
        $text = $tweet->text;
        if (strpos($text, '死ね') !== false ||
            strpos($text, '殺す') !== false ||
            strpos($text, 'こぉす') !== false)
        {
            echo $tweet->id_str . ',' . preg_replace('/\s+/s', ' ', $text) . "\n";
        }
    }
}
