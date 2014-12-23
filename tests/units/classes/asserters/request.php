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

    public function testSetMethodAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setMethodAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $method) {
					return $method = new \mock\mageekguy\atoum\http\asserters\request\method;
				},
				$message = new \mock\Psr\Http\Message\OutgoingRequestInterface
			)
			->if(
				$this->calling($message)->getMethod = uniqid(),
				$this->testedInstance->setWith($message)
			)
			->then
				->object($this->testedInstance->setMethodAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->method)->isIdenticalTo($method)
				->mock($method)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->method)->isIdenticalTo($method)
				->mock($method)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetUrlAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setUrlAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $method) {
					return $method = new \mock\mageekguy\atoum\http\asserters\request\url;
				},
				$message = new \mock\Psr\Http\Message\OutgoingRequestInterface
			)
			->if(
				$this->calling($message)->getUrl = uniqid(),
				$this->testedInstance->setWith($message)
			)
			->then
				->object($this->testedInstance->setUrlAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->url)->isIdenticalTo($method)
				->mock($method)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->url)->isIdenticalTo($method)
				->mock($method)
					->call('setWithTest')->withArguments($test)->once
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

    public function testMethod()
	{
		$this
			->given(
				$this->newTestedInstance,
				$this->testedInstance->setMethodAsserterFactory(function() use (& $method) {
                        $method = new \mock\mageekguy\atoum\http\asserters\request\method;

						return $method;
					}
				),
				$request = new \mock\Psr\Http\Message\OutgoingRequestInterface
			)
			->if(
				$this->calling($request)->getMethod = uniqid(),
				$this->testedInstance->setWith($request)
			)
			->then
				->object($this->testedInstance->method())->isInstanceOf('mageekguy\atoum\http\asserters\request\method')
				->mock($method)
					->call('setParentAsserter')->withArguments($this->testedInstance)->once
		;
	}

    public function testUrl()
	{
		$this
			->given(
				$this->newTestedInstance,
				$this->testedInstance->setUrlAsserterFactory(function() use (& $url) {
                        $url = new \mock\mageekguy\atoum\http\asserters\request\url;

						return $url;
					}
				),
				$request = new \mock\Psr\Http\Message\OutgoingRequestInterface
			)
			->if(
				$this->calling($request)->getUrl = uniqid(),
				$this->testedInstance->setWith($request)
			)
			->then
				->object($this->testedInstance->url())->isInstanceOf('mageekguy\atoum\http\asserters\request\url')
				->mock($url)
					->call('setParentAsserter')->withArguments($this->testedInstance)->once
		;
	}
} 
