<?php

namespace Piper\transform;

use Piper\ITransform;
use Piper\Stream;
use Piper\IStream;

/**
 * @template T
 * @implements ITransform<T, T>
 */
class RepeatTransform implements ITransform
{

    private int $times = 0;

    public function __construct(int $timesToRepeat)
    {
        $this->times = $timesToRepeat;
    }

    /**
     * @param T $val
     * @return IStream<T, T>
     */
    public function transform($val): IStream
    {
        /** @var Stream<T> */
        $stream = new Stream();
        for ($i = 0; $i < $this->times; $i++) {
            $stream->in($val);
        }
        return $stream;
    }

}
