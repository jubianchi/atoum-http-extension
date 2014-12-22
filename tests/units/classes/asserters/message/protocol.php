<?php

namespace mageekguy\atoum\http\tests\units\asserters\message;

use atoum;
use mageekguy\atoum\http\asserters\message;

class protocol extends atoum
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
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface
			)
			->if(
				$this->calling($request)->getProtocolVersion = uniqid(),
				$message->setWith($request)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
		;
	}

	public function testIsGreaterThan()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface
			)
			->if(
				$this->function->version_compare = -1,
				$this->calling($request)->getProtocolVersion = uniqid(),
				$message->setWith($request),
				$this->testedInstance->setParentAsserter($message)
			)
			->then
				->exception(function($test) {
						$test->testedInstance->isGreaterThan(uniqid());
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
			->if($this->function->version_compare = 0)
			->then
				->exception(function($test) {
						$test->testedInstance->isGreaterThan(uniqid());
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
			->if($this->function->version_compare = 1)
			->then
				->object($this->testedInstance->isGreaterThan(uniqid()))->isTestedInstance
		;
	}

	public function testIsLowerThan()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new message(),
				$request = new \mock\Psr\Http\Message\MessageInterface
			)
			->if(
				$this->function->version_compare = 0,
				$this->calling($request)->getProtocolVersion = uniqid(),
				$message->setWith($request),
				$this->testedInstance->setParentAsserter($message)
			)
			->then
				->exception(function($test) {
						$test->testedInstance->isLowerThan(uniqid());
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
			->if($this->function->version_compare = 1)
			->then
				->exception(function($test) {
						$test->testedInstance->isLowerThan(uniqid());
					}
				)
					->isInstanceOf('mageekguy\atoum\asserter\exception')
			->if($this->function->version_compare = -1)
			->then
				->object($this->testedInstance->isLowerThan(uniqid()))->isTestedInstance
		;
	}
} 
