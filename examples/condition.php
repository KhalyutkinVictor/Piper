<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Piper\Pipe;
use Piper\IStream;
use Piper\Stream;
use Piper\pipe\CondPipe;
use Piper\predicate\MoreThan;
use Piper\transform\Multiplay;
use Piper\stream\TransformStream;

/**
 * @template T
 * @template O
 * @param IStream<T, O> $s
 */
function printStream(IStream $s): void
{
    while(!$s->isEmpty()) {
        echo (string)$s->out() . ' ';
    }
    echo "\n";
}

/**
 * @template T
 * @template O
 * @param IStream<T, O> $s
 * @param array<T> $data
 */
function fillStream(IStream $s, array $data): void
{
    foreach ($data as $val) {
       $s->in($val);
    }
}


$data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
/** @var Stream<int> */
$s = new Stream();
fillStream($s, $data);
printStream($s);

$condPipe = new CondPipe([
    ['predicate' => new MoreThan(4), 'stream' => new TransformStream(new \Piper\transform\MultiplyNumsTransform(3))]
]);

$p = new Pipe($s, $condPipe);

fillStream($p, $data);
printStream($p);
