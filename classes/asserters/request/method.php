<?php

namespace mageekguy\atoum\http\asserters\request;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class method extends string
{
	protected $request;

	public function __call($method, $arguments)
	{
        return call_user_func_array(array($this->request, $method), $arguments);
	}

	public function __get($asserter)
	{
        switch (strtolower($asserter))
        {
            case 'isget':
            case 'ispost':
            case 'isput':
            case 'ishead':
            case 'isoptions':
            case 'isdelete':
            case 'istrace':
            case 'isconnect':
                return $this->{$asserter}();

            default:
                return $this->request->__get($asserter);
        }
	}

	public function setParentAsserter(atoum\http\asserters\request $request)
	{
		$this->request = $request;

		return $this->setWith($this->request->getValue()->getMethod());
	}

    public function isGet($failMessage = null)
    {
        return $this->match('/^GET$/i', $failMessage ?: $this->_('%s is not a GET request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isPost($failMessage = null)
    {
        return $this->match('/^POST$/i', $failMessage ?: $this->_('%s is not a POST request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isPut($failMessage = null)
    {
        return $this->match('/^PUT$/i', $failMessage ?: $this->_('%s is not a PUT request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isHead($failMessage = null)
    {
        return $this->match('/^HEAD$/i', $failMessage ?: $this->_('%s is not a HEAD request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isOptions($failMessage = null)
    {
        return $this->match('/^OPTIONS$/i', $failMessage ?: $this->_('%s is not a OPTIONS request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isDelete($failMessage = null)
    {
        return $this->match('/^DELETE$/i', $failMessage ?: $this->_('%s is not a DELETE request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isTrace($failMessage = null)
    {
        return $this->match('/^TRACE$/i', $failMessage ?: $this->_('%s is not a TRACE request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }

    public function isConnect($failMessage = null)
    {
        return $this->match('/^CONNECT$/i', $failMessage ?: $this->_('%s is not a CONNECT request', $this->getAnalyzer()->getTypeOf($this->request->getValue())));
    }
} 
