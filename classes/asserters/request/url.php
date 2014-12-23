<?php

namespace mageekguy\atoum\http\asserters\request;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class url extends string
{
	protected $request;

	public function __call($method, $arguments)
	{
        return call_user_func_array(array($this->request, $method), $arguments);
	}

	public function __get($asserter)
	{
        return $this->request->__get($asserter);
	}

	public function setParentAsserter(atoum\http\asserters\request $request)
	{
		$this->request = $request;

		return $this->setWith($this->request->getValue()->getUrl());
	}
} 
