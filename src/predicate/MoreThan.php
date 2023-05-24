<?php

namespace Piper\predicate;

use Piper\predicate\IPredicate;

/**
 * @template T of int|float
 * @implements IPredicate<T>
 */
class MoreThan implements IPredicate
{

    private int|float $num;

    public function __construct(int|float $num)
    {
        $this->num = $num;
    }

    /**
     * @param T $val
     * @return bool
     */
    public function predicate($val): bool
    {
        if ($val > $this->num) {
            return true;
        }
        return false;
    }

}
