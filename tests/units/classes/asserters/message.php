<?php

namespace mageekguy\atoum\http\tests\units\asserters;

use atoum;

class message extends atoum
{
    public function testClass()
    {
        $this
            ->testedClass
                ->extends('mageekguy\atoum\asserters\object')
        ;
    }

    public function testSetProtocolAsserterFactory()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setProtocolAsserterFactory())->isTestedInstance
			->given(
                $factory = function() use (& $protocol) {
                    return $protocol = new \mock\mageekguy\atoum\http\asserters\message\protocol;
                },
                $message = new \mock\Psr\Http\Message\MessageInterface
            )
            ->if(
                $this->calling($message)->getProtocolVersion = uniqid(),
                $this->testedInstance->setWith($message)
            )
            ->then
                ->object($this->testedInstance->setProtocolAsserterFactory($factory))->isTestedInstance
                ->object($this->testedInstance->protocol)->isIdenticalTo($protocol)
                ->mock($protocol)
                    ->call('setWithTest')->never
            ->given($test = new \mock\atoum\test)
            ->if($this->testedInstance->setWithTest($test))
            ->then
                ->object($this->testedInstance->protocol)->isIdenticalTo($protocol)
                ->mock($protocol)
                    ->call('setWithTest')->withArguments($test)->once
        ;
    }

    public function testSetBodyAsserterFactory()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setBodyAsserterFactory())->isTestedInstance
            ->given(
                $factory = function() use (& $body) {
                    return $body = new \mock\mageekguy\atoum\http\asserters\message\body;
                },
                $message = new \mock\Psr\Http\Message\MessageInterface,
                $stream = new \mock\Psr\Http\Message\StreamableInterface
            )
            ->if(
                $this->calling($stream)->__toString = uniqid(),
                $this->calling($message)->getBody = $stream,
                $this->testedInstance->setWith($message)
            )
            ->then
                ->object($this->testedInstance->setBodyAsserterFactory($factory))->isTestedInstance
                ->object($this->testedInstance->body)->isIdenticalTo($body)
                ->mock($body)
                    ->call('setWithTest')->never
            ->given($test = new \mock\atoum\test)
            ->if($this->testedInstance->setWithTest($test))
            ->then
                ->object($this->testedInstance->body)->isIdenticalTo($body)
                ->mock($body)
                    ->call('setWithTest')->withArguments($test)->once
        ;
    }

    public function testSetHeadersAsserterFactory()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setHeadersAsserterFactory())->isTestedInstance
            ->given(
                $factory = function() use (& $headers) {
                    return $headers = new \mock\mageekguy\atoum\http\asserters\message\headers;
                },
                $message = new \mock\Psr\Http\Message\MessageInterface
            )
            ->if(
                $this->calling($message)->getHeaders = array(),
                $this->testedInstance->setWith($message)
            )
            ->then
                ->object($this->testedInstance->setHeadersAsserterFactory($factory))->isTestedInstance
                ->object($this->testedInstance->headers)->isIdenticalTo($headers)
                ->mock($headers)
                    ->call('setWithTest')->never
            ->given($test = new \mock\atoum\test)
            ->if($this->testedInstance->setWithTest($test))
            ->then
                ->object($this->testedInstance->headers)->isIdenticalTo($headers)
                ->mock($headers)
                    ->call('setWithTest')->withArguments($test)->once
        ;
    }

    public function testSetWith()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->exception(function($test) {
                        $test->testedInstance->setWith(new \stdClass);
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
                ->object($this->testedInstance->setWith(new \mock\Psr\Http\Message\MessageInterface))->isTestedInstance
                ->object($this->testedInstance->setWith(new \stdClass, false))->isTestedInstance
        ;
    }

    public function testProtocol()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $this->testedInstance->setProtocolAsserterFactory(function() use (& $protocol) {
                        $protocol = new \mock\mageekguy\atoum\http\asserters\message\protocol;

                        return $protocol;
                    }
                ),
                $request = new \mock\Psr\Http\Message\MessageInterface
            )
            ->if(
                $this->calling($request)->getProtocolVersion = uniqid(),
                $this->testedInstance->setWith($request)
            )
            ->then
                ->object($this->testedInstance->protocol())->isInstanceOf('mageekguy\atoum\http\asserters\message\protocol')
                ->mock($protocol)
                    ->call('setParentAsserter')->withArguments($this->testedInstance)->once
        ;
    }

    public function testBody()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $this->testedInstance->setBodyAsserterFactory(function() use (& $body) {
                        $body = new \mock\mageekguy\atoum\http\asserters\message\body;

                        return $body;
                    }
                ),
                $request = new \mock\Psr\Http\Message\MessageInterface,
                $stream = new \mock\Psr\Http\Message\StreamableInterface
            )
            ->if(
                $this->calling($stream)->__toString = uniqid(),
                $this->calling($request)->getBody = $stream,
                $this->testedInstance->setWith($request)
            )
            ->then
                ->object($this->testedInstance->body())->isInstanceOf('mageekguy\atoum\http\asserters\message\body')
                ->mock($body)
                    ->call('setParentAsserter')->withArguments($this->testedInstance)->once
        ;
    }

    public function testHeaders()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $this->testedInstance->setHeadersAsserterFactory(function() use (& $headers) {
                        $headers = new \mock\mageekguy\atoum\http\asserters\message\headers;

                        return $headers;
                    }
                ),
                $request = new \mock\Psr\Http\Message\MessageInterface
            )
            ->if(
                $this->calling($request)->getHeaders = array(),
                $this->testedInstance->setWith($request)
            )
            ->then
                ->object($this->testedInstance->headers())->isInstanceOf('mageekguy\atoum\http\asserters\message\headers')
                ->mock($headers)
                    ->call('setParentAsserter')->withArguments($this->testedInstance)->once
        ;
    }
} 
