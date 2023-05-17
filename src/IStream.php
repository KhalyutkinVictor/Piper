<?php

namespace Piper;

/**
 * @template T
 * @template O
 */
interface IStream
{

    /**
     * @param T $val
     */
    public function in($val): void;

    /**
     * @return O
     */
    public function out(): mixed;

    /**
     * @return bool
     */
    public function isEmpty(): bool;

}
