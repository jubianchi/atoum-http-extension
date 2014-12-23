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

            $units = function($script, $argument, $values) {
				$script->getRunner()->addTestsFromDirectory(dirname(__DIR__) . '/tests/units/classes');
			};

            $functionals = function($script, $argument, $values) {
                $script->getRunner()->addTestsFromDirectory(dirname(__DIR__) . '/tests/functionals');
            };

			$parser
				->addHandler($units, array('--test-ext'))
				->addHandler($units, array('--test-it'))
				->addHandler($functionals, array('--test-functionals'))
				->addHandler(
                    function($script, $argument, $values) use ($units, $functionals) {
                        $units($script, $argument, $values);
                        $functionals($script, $argument, $values);
                    },
                    array('--test-all-ext')
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
