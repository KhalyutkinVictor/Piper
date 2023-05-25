<?php

namespace Piper;

class StreamHelper
{

    /**
     * @template T
     * @template O
     * @param IStream<T, O> $stream
     * @param T[] $arr
     * @return IStream<T, O>
     */
    public static function fillStreamFromArray(IStream $stream, array $arr): IStream
    {
        foreach ($arr as $val) {
            $stream->in($val);
        }
        return $stream;
    }

    /**
     * @template T
     * @template O
     * @param IStream<T, O> $stream
     * @return O[]
     */
    public static function fromStreamToArray(IStream $stream): array
    {
        $a = [];
        while (!$stream->isEmpty()) {
            $a[] = $stream->out();
        }
        return $a;
    }

}