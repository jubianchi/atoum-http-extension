<?php

namespace mageekguy\atoum\http\tests\units\asserters\request\url;

use atoum;
use mageekguy\atoum\http\asserters\request;

class port extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\integer')
		;
	}
} 
