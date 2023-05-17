<?php

namespace Piper;

use Piper\ITransform;
use Piper\IStream;

/**
 * @template T
 * @template O
 * @implements IStream<T, O>
 */
class TransformStream implements IStream
{

    /** @use BaseStreamTrait<O> */
    use BaseStreamTrait;

    /** @var \Piper\ITransform<T, O>  */
    private ITransform $transform;

    /**
     * @param ITransform<T, O> $transform
     */
    public function __construct(ITransform $transform)
    {
        $this->transform = $transform;
    }

    /**
     * @param T $val
     */
    public function in($val): void
    {
        $this->buf[] = $this->transform->transform($val);
    }

}
