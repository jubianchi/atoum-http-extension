<?php

namespace mageekguy\atoum\http\tests\functionals\tests\fixtures;

use mageekguy\atoum\http\tests\fixtures\body;
use mageekguy\atoum\http\tests\functional;

class message extends functional
{
    public function testProtocol()
    {
        $this
            ->given(
                $protocol = uniqid(),
                $this->newTestedInstance($protocol, array(), new body(uniqid()))
            )
            ->then
                ->message($this->testedInstance)
                    ->protocol->isEqualTo($protocol)
        ;
    }

    public function testBody()
    {
        $this
            ->given(
                $body = uniqid(),
                $this->newTestedInstance(uniqid(), array(), new body($body))
            )
            ->then
                ->message($this->testedInstance)
                    ->body->isEqualTo($body)
        ;
    }

    public function testHeaders()
    {
        $this
            ->given(
                $header = uniqid(),
                $value = uniqid(),
                $this->newTestedInstance(uniqid(), array($header => $value), new body(uniqid()))
            )
            ->then
                ->message($this->testedInstance)
                    ->headers
                        ->has($header)
                        ->string[$header]->isEqualTo($value)
        ;
    }

    public function testAll()
    {
        $this
            ->given(
                $protocol = uniqid(),
                $header = uniqid(),
                $value = uniqid(),
                $body = uniqid(),
                $this->newTestedInstance($protocol, array($header => $value), new body($body))
            )
            ->then
                ->message($this->testedInstance)
                    ->protocol->isEqualTo($protocol)
                    ->body->isEqualTo($body)
                    ->headers
                        ->string[$header]->isEqualTo($value)
        ;
    }
} 
