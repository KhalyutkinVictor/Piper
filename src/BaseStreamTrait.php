<?php

namespace Piper;

/**
 * @template O
 */
trait BaseStreamTrait
{
    /** @var O[] */
    public array $buf = [];

    /**
     * @return O
     * @throws EmptyBufferException
     */
    public function out(): mixed
    {
        if ($this->isEmpty()) {
            throw new EmptyBufferException('Trying to get value from empty buffer');
        }
        return array_shift($this->buf);
    }

    public function isEmpty(): bool
    {
        return count($this->buf) === 0;
    }

}
