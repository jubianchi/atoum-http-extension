<?php

namespace mageekguy\atoum\http\tests\units\asserters\message;

use atoum;
use mageekguy\atoum\http\asserters\message;

class headers extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\phpArray')
		;
	}

	public function testSetParentAsserter()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface
			)
			->if(
				$this->calling($request)->getHeaders = array(),
				$message->setWith($request)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
                ->mock($request)
                    ->call('getHeaders')->once
		;
	}

	public function testHas()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface
			)
			->if(
				$this->calling($request)->getHeaders = array(),
				$this->calling($request)->hasHeader = true,
				$message->setWith($request),
				$this->testedInstance->setParentAsserter($message)
			)
			->then
				->object($this->testedInstance->has(uniqid()))->isTestedInstance
			->if($this->calling($request)->hasHeader = false)
			->then
				->exception(function($test) {
						$test->testedInstance->has(uniqid());
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
		;
	}
} 
