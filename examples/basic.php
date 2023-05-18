<?php

include __DIR__ . '/../vendor/autoload.php';

use Piper\Pipe;
use Piper\Stream;
use Piper\stream\TransformStream;
use Piper\transform\MultiplayNumsTransform;
use Piper\transform\RepeatTransform;

$a = [1, 2, 3, 4, 5];

/** @var Stream<int> $inStream */
$inStream = new Stream();

/** @var TransformStream<int, int> */
$transformStream = new TransformStream(new MultiplayNumsTransform(2));
$pipe = new Pipe($inStream, $transformStream);

foreach ($a as $v) {
    $pipe->in($v);
}

while (!$pipe->isEmpty()) {
    echo $pipe->out() . " ";
}
echo "\n";

/** @var TransformStream<int, int> */
$repeatStream = new TransformStream(new RepeatTransform(3));
$pipe2 = new Pipe($pipe, $repeatStream);

foreach ($a as $v) {
    $pipe2->in($v);
}

while (!$pipe2->isEmpty()) {
    echo $pipe2->out() . " ";
}
echo "\n";
