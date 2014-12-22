<?php

namespace mageekguy\atoum\http\asserters;

use mageekguy\atoum\asserter;
use mageekguy\atoum\test;
use mageekguy\atoum\tools;
use mageekguy\atoum;
use Psr\Http\Message\OutgoingRequestInterface;
use Psr\Http\Message\IncomingRequestInterface;

class request extends message
{
	public function setWith($value, $checkType = true)
	{
		parent::setWith($value, $checkType);

		if ($checkType === true && $value instanceof OutgoingRequestInterface === false && $value instanceof IncomingRequestInterface === false)
		{
			$this->fail($this->_(sprintf('%s is not a valid HTTP request', $this)));
		}

		return $this;
	}
} 
