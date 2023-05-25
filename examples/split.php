<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Piper\stream\TransformStream;

function printStrArray($arr)
{
    foreach ($arr as $s) {
        echo $s . " | ";
    }
    echo "\n";
}

$data = "Hello, world!!!\nHi, Piper!!!\nPrivet";
$anotherData = "Some long text\nWith separator";

$ts = new TransformStream(new \Piper\transform\SplitTransform("\n"));
\Piper\StreamHelper::fillStreamFromArray($ts, [$data, $anotherData]);
printStrArray(\Piper\StreamHelper::fromStreamToArray($ts));
