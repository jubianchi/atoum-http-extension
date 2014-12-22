<?php

namespace mageekguy\atoum\http\tests\units\asserters;

use atoum;

class request extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\http\asserters\message')
		;
	}
	
	public function testSetWith()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->exception(function($test) {
						$test->testedInstance->setWith(new \mock\Psr\Http\Message\MessageInterface);
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
				->object($this->testedInstance->setWith(new \mock\Psr\Http\Message\OutgoingRequestInterface))->isTestedInstance
				->object($this->testedInstance->setWith(new \mock\Psr\Http\Message\IncomingRequestInterface))->isTestedInstance
				->object($this->testedInstance->setWith(new \stdClass, false))->isTestedInstance
		;
	}
} 
