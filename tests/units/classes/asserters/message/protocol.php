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
} 
