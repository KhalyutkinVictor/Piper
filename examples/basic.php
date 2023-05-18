<?php

include __DIR__ . '/../vendor/autoload.php';

use Piper\Pipe;
use Piper\Stream;
use Piper\TransformStream;

$a = [1, 2, 3, 4, 5];

/** @var Stream<int> $inStream */
$inStream = new Stream();

/** @var TransformStream<int, int> */
$transformStream = new TransformStream(new \Piper\MultiplayNumsTransform(2));
$pipe = new Pipe($inStream, $transformStream);

foreach ($a as $v) {
    $pipe->in($v);
}

while (!$pipe->isEmpty()) {
    echo $pipe->out() . " ";
}
echo "\n";
