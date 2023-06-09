<?php

namespace Piper\stream;

use Piper\ITransform;
use Piper\IStream;
use Piper\BaseStreamTrait;

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
        $stream = $this->transform->transform($val);
        while (!$stream->isEmpty()) {
            $this->buf[] = $stream->out();
        }
    }

}
