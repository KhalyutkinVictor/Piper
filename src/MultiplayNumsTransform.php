<?php

namespace Piper;

/**
 * @implements ITransform<int|float, int|float>
 */
class MultiplayNumsTransform implements ITransform
{

    private int|float $coeff;

    public function __construct(int|float $coeff)
    {
        $this->coeff = $coeff;
    }

    /**
     * @param int|float $val
     * @return int|float
     */
    public function transform($val): mixed
    {
        return $val * $this->coeff;
    }

}
