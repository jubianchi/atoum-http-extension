<?php

namespace mageekguy\atoum\http\tests\units\asserters\request;

use atoum;
use mageekguy\atoum\http\asserters\request;

class url extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\string')
		;
	}

	public function testSetParentAsserter()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new request(),
				$request = new \mock\Psr\Http\Message\OutgoingRequestInterface
			)
			->if(
				$this->calling($request)->getUrl = uniqid(),
				$message->setWith($request)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
                ->mock($request)
                    ->call('getUrl')->once
		;
	}
} 
