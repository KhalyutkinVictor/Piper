<?php

namespace Piper;

/**
 * @template T
 * @template O
 */
trait StreamHelperTrait
{

    /**
     * @param IStream<T, O> $stream
     */
    private function moveEverythingFromStreamToBuf(IStream $stream): void
    {
        while (!$stream->isEmpty()) {
            $this->buf[] = $stream->out();
        }
    }

}
