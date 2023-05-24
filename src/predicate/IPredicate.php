<?php

namespace Piper\predicate;

use Piper\IStream;

/**
 * @template T
 */
interface IPredicate
{
    /** 
     * @param T $val
     * @return bool
     */
    public function predicate($val): bool;

}

