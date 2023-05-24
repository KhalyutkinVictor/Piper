<?php

namespace Piper\transform;

use Piper\IStream;
use Piper\ITransform;
use Piper\Stream;

/**
 * @implements ITransform<int|float, int|float>
 */
class MultiplyNumsTransform implements ITransform
{

    private int|float $coeff;

    public function __construct(int|float $coeff)
    {
        $this->coeff = $coeff;
    }

    /**
     * @param int|float $val
     * @return IStream<int|float, int|float>
     */
    public function transform($val): IStream
    {
        /** @var Stream<int|float> */
        $stream = new Stream();
        $stream->in($val * $this->coeff);
        return $stream;
    }

}
