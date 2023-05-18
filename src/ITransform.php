<?php

namespace Piper;

use Piper\IStream;

/**
 * @template T
 * @template O
 */
interface ITransform
{

    /**
     * @param T $val
     * @return IStream<O, O>
     */
    public function transform($val): IStream;

}
