<?php

namespace Piper;

/**
 * @template T
 * @template O
 */
interface ITransform
{

    /**
     * @param T $val
     * @return O
     */
    public function transform($val): mixed;

}
