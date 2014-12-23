<?php

namespace mageekguy\atoum\http;

use mageekguy\atoum;
use mageekguy\atoum\observable;
use mageekguy\atoum\runner;

class extension implements atoum\extension
{
	protected $runner;
	protected $test;

	public function __construct(atoum\configurator $configurator = null)
	{
		if ($configurator)
		{
			$parser = $configurator->getScript()->getArgumentsParser();
			$handler = function($script, $argument, $values) {
				$script->getRunner()->addTestsFromDirectory(dirname(__DIR__) . '/tests/units/classes');
			};

			$parser
				->addHandler($handler, array('--test-ext'))
				->addHandler($handler, array('--test-it'))
				->addHandler(
					function($script, $argument, $values) {
						$script->getRunner()->addTestsFromDirectory(dirname(__DIR__) . '/tests/functionals');
					},
					array('--test-functionals')
				)
			;
		}
	}

	public function setRunner(runner $runner)
	{
		$this->runner = $runner;

		return $this;
	}

	public function getRunner()
	{
		return $this->runner;
	}

	public function setTest(atoum\test $test)
	{
		$this->test = $test;

		$this->test->getAsserterGenerator()->addNamespace(__NAMESPACE__ . '\\asserters');

		return $this;
	}

	public function getTest()
	{
		return $this->test;
	}

	public function handleEvent($event, observable $observable)
	{
		return $this;
	}
}
