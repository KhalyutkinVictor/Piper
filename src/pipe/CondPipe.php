<?php

namespace Piper\pipe;

use Piper\IStream;
use Piper\StreamHelperTrait;
use Piper\BaseStreamTrait;
use Piper\predicate\IPredicate;

/**
 * @template T
 * @template O
 * @implements IStream<T, O>
 */
class CondPipe implements IStream
{
    /** @use BaseStreamTrait<O> */
    use BaseStreamTrait;

    /** @use StreamHelperTrait<T, O> */
    use StreamHelperTrait;

    /** @var array{predicate: IPredicate<T>, stream: IStream<T, O>}[] $conditions */
    private array $conditions;

    /** @var IStream<T, O> $default */
    private ?IStream $default = null;

    /**
     * @param array{predicate: IPredicate<T>, stream: IStream<T, O>}[] $conditions
     * @param IStream<T, O> $default
     */
    public function __construct(array $conditions, ?IStream $default = null)
    {
        $this->conditions = $conditions;
        $this->default = $default;
    }

    /**
     * @param T $val
     */
    public function in($val): void
    {
        foreach ($this->conditions as $cond) {
            $predicate = $cond['predicate'];
            if ($predicate->predicate($val)) {
                $stream = $cond['stream'];
                $stream->in($val);
                $this->moveEverythingFromStreamToBuf($stream);
                return;
            }
        }
        if ($this->default) {
            $this->default->in($val);
            $this->moveEverythingFromStreamToBuf($this->default);
        }
    }

}
