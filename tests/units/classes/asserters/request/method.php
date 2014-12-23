<?php

namespace mageekguy\atoum\http\tests\units\asserters\request;

use atoum;
use mageekguy\atoum\http\asserters\request;

class method extends atoum
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
				$this->calling($request)->getMethod = uniqid(),
				$message->setWith($request)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
                ->mock($request)
                    ->call('getMethod')->once
		;
	}

    public function testIsGet()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isGet;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'GET')
            ->then
                ->object($this->testedInstance->isGet)->isTestedInstance
                ->object($this->testedInstance->isGet())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'get')
            ->then
                ->object($this->testedInstance->isGet)->isTestedInstance
                ->object($this->testedInstance->isGet())->isTestedInstance
        ;
    }

    public function testIsPost()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isPost;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'POST')
            ->then
                ->object($this->testedInstance->isPost)->isTestedInstance
                ->object($this->testedInstance->isPost())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'post')
            ->then
                ->object($this->testedInstance->isPost)->isTestedInstance
                ->object($this->testedInstance->isPost())->isTestedInstance
        ;
    }

    public function testIsPut()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isPut;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'PUT')
            ->then
                ->object($this->testedInstance->isPut)->isTestedInstance
                ->object($this->testedInstance->isPut())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'put')
            ->then
                ->object($this->testedInstance->isPut)->isTestedInstance
                ->object($this->testedInstance->isPut())->isTestedInstance
        ;
    }

    public function testIsHead()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isHead;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'HEAD')
            ->then
                ->object($this->testedInstance->isHead)->isTestedInstance
                ->object($this->testedInstance->isHead())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'head')
            ->then
                ->object($this->testedInstance->isHead)->isTestedInstance
                ->object($this->testedInstance->isHead())->isTestedInstance
        ;
    }

    public function testIsOptions()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isOptions;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'OPTIONS')
            ->then
                ->object($this->testedInstance->isOptions)->isTestedInstance
                ->object($this->testedInstance->isOptions())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'options')
            ->then
                ->object($this->testedInstance->isOptions)->isTestedInstance
                ->object($this->testedInstance->isOptions())->isTestedInstance
        ;
    }

    public function testIsDelete()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isDelete;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'DELETE')
            ->then
                ->object($this->testedInstance->isDelete)->isTestedInstance
                ->object($this->testedInstance->isDelete())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'delete')
            ->then
                ->object($this->testedInstance->isDelete)->isTestedInstance
                ->object($this->testedInstance->isDelete())->isTestedInstance
        ;
    }

    public function testIsTrace()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isTrace;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'TRACE')
            ->then
                ->object($this->testedInstance->isTrace)->isTestedInstance
                ->object($this->testedInstance->isTrace())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'trace')
            ->then
                ->object($this->testedInstance->isTrace)->isTestedInstance
                ->object($this->testedInstance->isTrace())->isTestedInstance
        ;
    }

    public function testIsConnect()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new request(),
                $request = new \mock\Psr\Http\Message\OutgoingRequestInterface
            )
            ->if(
                $this->calling($request)->getMethod = uniqid(),
                $message->setWith($request)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isConnect;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if($this->calling($request)->getMethod = 'CONNECT')
            ->then
                ->object($this->testedInstance->isConnect)->isTestedInstance
                ->object($this->testedInstance->isConnect())->isTestedInstance
            ->if($this->calling($request)->getMethod = 'connect')
            ->then
                ->object($this->testedInstance->isConnect)->isTestedInstance
                ->object($this->testedInstance->isConnect())->isTestedInstance
        ;
    }
} 
