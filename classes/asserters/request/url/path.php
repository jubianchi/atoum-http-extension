<?php

namespace mageekguy\atoum\http\asserters\request\url;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class path extends string
{
	protected $url;

	public function __call($method, $arguments)
	{
        return call_user_func_array(array($this->url, $method), $arguments);
	}

	public function __get($asserter)
	{
        try
        {
            return parent::__get($asserter);
        }
        catch(exceptions\logic\invalidArgument $exception)
        {
            return $this->url->__get($asserter);
        }
	}

	public function setParentAsserter(atoum\http\asserters\request\url $url)
	{
		$this->url = $url;

		return $this->setWith((string) parse_url($this->url->getValue(), PHP_URL_PATH));
	}
} 
