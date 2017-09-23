#!/usr/bin/env php
<?php
use Abraham\TwitterOAuth\TwitterOAuth;

require_once(__DIR__ . '/vendor/autoload.php');

$config = require(__DIR__ . '/config.php');
$twitter = new TwitterOAuth(
    $config['consumerKey'],
    $config['consumerSecret'],
    $config['accessToken'],
    $config['accessTokenSecret']
);

$lines = file(__DIR__ . '/found.txt');
$fh = fopen(__DIR__ . '/failed.txt', 'w');
foreach ($lines as $i => $line) {
    $line = trim($line);
    if ($line === '') {
        continue;
    }
    list($id, $text) = explode(',', $line, 2);
    printf(
        "[%d / %d] Deleting a status (id=%s, text=%s)\n",
        ($i + 1),
        count($lines),
        $id,
        mb_strimwidth($text, 0, 20, '', 'UTF-8')
    );

    $ret = $twitter->post(sprintf(
        'statuses/destroy/%s',
        rawurlencode($id)
    ));
    if ($twitter->getLastHttpCode() == 200) {
        echo "=> OK\n";
    } elseif ($twitter->getLastHttpCode() == 404) {
        echo "=> NOT FOUND\n";
    } else {
        echo "=> FAILED\n";
        fwrite($fh, $line . "\n");
    }
}
