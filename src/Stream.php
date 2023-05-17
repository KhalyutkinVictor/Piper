<?php

namespace Piper;

/**
 * @template T
 * @implements IStream<T, T>
 */
class Stream implements IStream
{

    /** @use BaseStreamTrait<T> */
    use BaseStreamTrait;

    /**
     * @param T $val
     */
    public function in($val): void
    {
        $this->buf[] = $val;
    }

}
