<?php

namespace mageekguy\atoum\http\asserters\message;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\phpArray;
use mageekguy\atoum\asserters;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class headers extends phpArray
{
    protected $message;

    public function __call($method, $arguments)
    {
        switch ($method)
        {
            case 'have':
                return call_user_func_array(array($this, 'has'), $arguments);

            default:
                return call_user_func_array(array($this->message, $method), $arguments);
        }
    }

    public function __get($asserter)
    {
        switch ($asserter)
        {
            case 'string':
            case 'header':
                return parent::__get('string');

            default:
                return $this->message->__get($asserter);
        }
    }

    public function setParentAsserter(atoum\http\asserters\message $message)
    {
        $this->message = $message;

        return $this->setWith($this->message->getValue()->getHeaders());
    }

    public function has($header, $failMessage = null)
    {
        if ($this->message->getValue()->hasHeader($header) === false)
        {
            $this->fail($failMessage ?: $this->_('%s does not have header %s', $this->getAnalyzer()->getTypeOf($this->message->getValue()), $header));
        }

        return $this->pass();
    }
} 
