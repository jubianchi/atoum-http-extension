<?php

namespace mageekguy\atoum\http\asserters\request\url;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;
use mageekguy\atoum\http\asserters\request\url;

class scheme extends string
{
	protected $url;

	public function __call($method, $arguments)
	{
        return call_user_func_array(array($this->url, $method), $arguments);
	}

	public function __get($asserter)
	{
        switch (strtolower($asserter))
        {
            case 'ishttp':
            case 'ishttps':
                return $this->{$asserter}();

            default:
                return $this->url->__get($asserter);
        }
	}

	public function setParentAsserter(url $url)
	{
		$this->url = $url;

		return $this->setWith(parse_url($this->url->getValue(), PHP_URL_SCHEME));
	}

    public function isHttp($failMessage = null)
    {
        return $this->isEqualTo('http', $failMessage ?: $this->_('%s is not a HTTP URL', $this->url));
    }

    public function isHttps($failMessage = null)
    {
        return $this->isEqualTo('https', $failMessage ?: $this->_('%s is not a HTTPS URL', $this->url));
    }
} 
