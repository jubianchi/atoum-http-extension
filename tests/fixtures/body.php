<?php

namespace mageekguy\atoum\http\tests\fixtures;

use Psr\Http\Message\OutgoingRequestInterface;
use Psr\Http\Message\StreamableInterface;

class body
{
    protected $contents;

    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    public function __toString()
    {
        return $this->contents;
    }
} 
