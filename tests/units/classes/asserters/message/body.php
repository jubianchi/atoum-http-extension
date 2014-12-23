<?php

namespace mageekguy\atoum\http\tests\units\asserters\message;

use atoum;
use mageekguy\atoum\http\asserters\message;

class body extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\castToString')
		;
	}

	public function testSetParentAsserter()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface,
				$body = new \mock\Psr\Http\Message\StreamableInterface
			)
			->if(
				$this->calling($body)->__toString = uniqid(),
				$this->calling($request)->getBody = $body,
				$message->setWith($request)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
                ->mock($request)
                    ->call('getBody')->once
		;
	}
} 
