<?php

namespace Piper\transform;

use Piper\IStream;
use Piper\ITransform;
use Piper\Stream;
use Piper\StreamHelper;

/**
 * @implements ITransform<string, string>
 */
class SplitTransform implements ITransform
{

    private string $separator;

    private int $limit = 0;

    /**
     * @param string $separator
     * @param int $limit 0 means no limit
     */
    public function __construct(string $separator, int $limit = 0)
    {
        $this->separator = $separator;
        $this->limit = $limit;
    }

    /**
     * @param string $val
     * @return IStream<string, string>
     */
    public function transform($val): IStream
    {
        $arr = ($this->limit === 0)
            ? explode($this->separator, $val)
            : explode($this->separator, $val, $this->limit);
        return StreamHelper::fillStreamFromArray(new Stream(), $arr);
    }

}
