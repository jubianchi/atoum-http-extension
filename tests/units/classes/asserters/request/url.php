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

    public function testSetSchemeAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setSchemeAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $scheme) {
					return $scheme = new \mock\mageekguy\atoum\http\asserters\request\url\scheme;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setSchemeAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->scheme)->isIdenticalTo($scheme)
				->mock($scheme)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->scheme)->isIdenticalTo($scheme)
				->mock($scheme)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetHostAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setHostAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $host) {
					return $host = new \mock\mageekguy\atoum\http\asserters\request\url\host;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setHostAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->host)->isIdenticalTo($host)
				->mock($host)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->host)->isIdenticalTo($host)
				->mock($host)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetPortAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setPortAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $port) {
					return $port = new \mock\mageekguy\atoum\http\asserters\request\url\port;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . ':' . rand(0, 65536),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setPortAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->port)->isIdenticalTo($port)
				->mock($port)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->port)->isIdenticalTo($port)
				->mock($port)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetUserAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setUserAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $user) {
					return $user = new \mock\mageekguy\atoum\http\asserters\request\url\user;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . '@' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setUserAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->user)->isIdenticalTo($user)
				->mock($user)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->user)->isIdenticalTo($user)
				->mock($user)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetPasswordAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setPasswordAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $password) {
					return $password = new \mock\mageekguy\atoum\http\asserters\request\url\password;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . ':' . uniqid() . '@' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setPasswordAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->password)->isIdenticalTo($password)
				->mock($password)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->password)->isIdenticalTo($password)
				->mock($password)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetPathAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setPathAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $path) {
					return $path = new \mock\mageekguy\atoum\http\asserters\request\url\path;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . '/' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setPathAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->path)->isIdenticalTo($path)
				->mock($path)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->path)->isIdenticalTo($path)
				->mock($path)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetQueryAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setQueryAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $query) {
					return $query = new \mock\mageekguy\atoum\http\asserters\request\url\query;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . '/?' . uniqid() . '=' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setQueryAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->query)->isIdenticalTo($query)
				->mock($query)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->query)->isIdenticalTo($query)
				->mock($query)
					->call('setWithTest')->withArguments($test)->once
		;
	}

    public function testSetFragmentAsserterFactory()
	{
		$this
			->given($this->newTestedInstance)
			->then
				->object($this->testedInstance->setFragmentAsserterFactory())->isTestedInstance
			->given(
				$factory = function() use (& $fragment) {
					return $fragment = new \mock\mageekguy\atoum\http\asserters\request\url\fragment;
				},
                $message = new \mock\Psr\Http\Message\OutgoingRequestInterface,
                $this->calling($message)->getUrl = 'http://' . uniqid() . '/#' . uniqid(),
                $request = new \mock\mageekguy\atoum\http\asserters\request,
                $this->calling($request)->getValue = $message
            )
            ->if($this->testedInstance->setParentAsserter($request))
			->then
				->object($this->testedInstance->setFragmentAsserterFactory($factory))->isTestedInstance
				->object($this->testedInstance->fragment)->isIdenticalTo($fragment)
				->mock($fragment)
					->call('setWithTest')->never
			->given($test = new \mock\atoum\test)
			->if($this->testedInstance->setWithTest($test))
			->then
				->object($this->testedInstance->fragment)->isIdenticalTo($fragment)
				->mock($fragment)
					->call('setWithTest')->withArguments($test)->once
		;
	}
} 
