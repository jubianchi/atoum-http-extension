<?php

namespace mageekguy\atoum\http\tests\units\asserters\request\url;

use atoum;
use mageekguy\atoum\http\asserters\request;

class scheme extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\string')
		;
	}

    public function testIsHttp()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $url = new \mock\mageekguy\atoum\http\asserters\request\url,
                $this->calling($url)->getValue = 'https://' . uniqid()
            )
            ->if($this->testedInstance->setParentAsserter($url))
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isHttp;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($url)->getValue = 'http://' . uniqid(),
                $this->testedInstance->setParentAsserter($url)
            )
            ->then
                ->object($this->testedInstance->isHttp())->isTestedInstance
                ->object($this->testedInstance->isHttp)->isTestedInstance
        ;
    }

    public function isHttps()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $url = new \mock\mageekguy\atoum\http\asserters\request\url,
                $this->calling($url)->getValue = 'http://' . uniqid()
            )
            ->if($this->testedInstance->setParentAsserter($url))
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isHttps;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($url)->getValue = 'https://' . uniqid(),
                $this->testedInstance->setParentAsserter($url)
            )
            ->then
                ->object($this->testedInstance->isHttps())->isTestedInstance
                ->object($this->testedInstance->isHttps)->isTestedInstance
        ;
    }
} 
