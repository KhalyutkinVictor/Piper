<?php

namespace Piper;

use Piper\IStream;
use Piper\ITransform;
use Piper\StreamHelperTrait;

/**
 * @template T
 * @template P
 * @template O
 * @implements IStream<T, O>
 */
class Pipe implements IStream
{
    /** @use BaseStreamTrait<O> */
    use BaseStreamTrait;

    /** @use StreamHelperTrait<P, O> */
    use StreamHelperTrait;

    /** @var \Piper\IStream<T, P> */
    private \Piper\IStream $s1;

    /** @var \Piper\IStream<P, O> */
    private \Piper\IStream $s2;

    /**
     * @param IStream<T, P> $s1
     * @param IStream<P, O> $s2
     */
    public function __construct(IStream $s1, IStream $s2)
    {
        $this->s1 = $s1;
        $this->s2 = $s2;
    }

    /**
     * @param T $val
     */
    public function in($val): void
    {
        $this->s1->in($val);
        while (!$this->s1->isEmpty()) {
            $this->s2->in($this->s1->out());
        }
        $this->moveEverythingFromStreamToBuf($this->s2);
    }

}
