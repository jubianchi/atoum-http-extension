<?php

namespace mageekguy\atoum\http\asserters\message;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class protocol extends string
{
    protected $message;

    public function __call($method, $arguments)
    {
        return call_user_func_array(array($this->message, $method), $arguments);
    }

    public function __get($asserter)
    {
        return $this->message->__get($asserter);
    }

    public function setParentAsserter(atoum\http\asserters\message $message)
    {
        $this->message = $message;

        return $this->setWith($this->message->getValue()->getProtocolVersion());
    }
} 
