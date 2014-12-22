<?php

namespace mageekguy\atoum\http\asserters;

use mageekguy\atoum\asserter;
use mageekguy\atoum\test;
use mageekguy\atoum\tools;
use mageekguy\atoum;
use Psr\Http\Message\OutgoingResponseInterface;
use Psr\Http\Message\IncomingResponseInterface;

class response extends message
{
	public function setWith($value, $checkType = true)
	{
		parent::setWith($value, $checkType);

		if ($checkType === true && $value instanceof OutgoingResponseInterface === false && $value instanceof IncomingResponseInterface === false)
		{
			$this->fail($this->_(sprintf('%s is not a valid HTTP response', $this)));
		}

		return $this;
	}
} 
