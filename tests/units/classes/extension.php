<?php

namespace mageekguy\atoum\http\tests\units;

use atoum;

class extension extends atoum
{
	public function testSetTest()
	{
		$this
			->given(
				$this->newTestedInstance,
				$test = new \mock\mageekguy\atoum\test,
				$generator = new \mock\mageekguy\atoum\asserter\generator
			)
			->if($this->calling($test)->getAsserterGenerator = $generator)
			->then
				->object($this->testedInstance->settest($test))->isTestedInstance
				->mock($generator)
					->call('addNamespace')->withArguments('mageekguy\atoum\http\asserters')->once
		;
	}

	public function testGetSetRunner()
	{
		$this
			->given(
				$this->newTestedInstance,
				$runner = new atoum\runner
			)
			->then
				->object($this->testedInstance->setRunner($runner))->isTestedInstance
				->object($this->testedInstance->getRunner())->isEqualTo($runner)
		;
	}

	public function testGetSetTest()
	{
		$this
			->given(
				$this->newTestedInstance,
				$test = new \mock\mageekguy\atoum\test
			)
			->then
				->object($this->testedInstance->setTest($test))->isTestedInstance
				->object($this->testedInstance->getTest())->isEqualTo($test)
		;
	}

	public function testHandleEvent()
	{
		$this
			->given(
				$this->newTestedInstance,
				$observable = new \mock\mageekguy\atoum\observable
			)
			->then
				->object($this->testedInstance->handleEvent(uniqid(), $observable))->isTestedInstance
		;
	}
} 
