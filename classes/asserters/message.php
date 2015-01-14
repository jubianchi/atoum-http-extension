<?php

namespace mageekguy\atoum\http\asserters;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\object;
use mageekguy\atoum\http\asserters\message\protocol;
use mageekguy\atoum\http\asserters\message\body;
use mageekguy\atoum\http\asserters\message\headers;
use mageekguy\atoum\test;
use mageekguy\atoum\tools;
use mageekguy\atoum;
use Psr\Http\Message\MessageInterface;

class message extends object
{
	protected $protocolAsserterFactory;
	protected $bodyAsserterFactory;
	protected $headersAsserterFactory;

	public function __construct(asserter\generator $generator = null, tools\variable\analyzer $analyzer = null, atoum\locale $locale = null)
	{
		parent::__construct($generator, $analyzer, $locale);

		$this
			->setProtocolAsserterFactory()
			->setBodyAsserterFactory()
			->setHeadersAsserterFactory()
		;
	}

	public function __get($property)
	{
		switch (strtolower($property))
		{
			case 'protocol':
			case 'body':
			case 'headers':
				return $this->{$property}();

			default:
				return parent::__get($property);
		}
	}

	public function setProtocolAsserterFactory(\closure $factory = null)
	{
		$factory = $factory ?: function(asserter\generator $generator) {
			return new protocol($generator);
		};

		$generator = $this->generator;
		$test = & $this->test;

		$this->protocolAsserterFactory = function() use ($generator, $factory, & $test) {
			$protocol = $factory($generator);

			if ($test !== null)
			{
				$protocol->setWithTest($test);
			}

			return $protocol;
		};

		return $this;
	}

	public function setBodyAsserterFactory(\closure $factory = null)
	{
		$factory = $factory ?: function(asserter\generator $generator) {
			return new body($generator);
		};

		$generator = $this->generator;
		$test = & $this->test;

		$this->bodyAsserterFactory = function() use ($generator, $factory, & $test) {
			$body = $factory($generator);

			if ($test !== null)
			{
				$body->setWithTest($test);
			}

			return $body;
		};

		return $this;
	}

	public function setHeadersAsserterFactory(\closure $factory = null)
	{
		$factory = $factory ?: function(asserter\generator $generator, atoum\test $test = null) {
			return new headers($generator);
		};

		$generator = $this->generator;
		$test = & $this->test;

		$this->headersAsserterFactory = function() use ($generator, $factory, & $test) {
			$headers = $factory($generator);

			if ($test !== null)
			{
				$headers->setWithTest($test);
			}

			return $headers;
		};

		return $this;
	}

	public function setWith($value, $checkType = true)
	{
		parent::setWith($value, $checkType);

		if ($checkType === true && $value instanceof MessageInterface === false)
		{
			$this->fail($this->_(sprintf('%s is not a valid HTTP message', $this)));
		}

		return $this;
	}

	public function protocol()
	{
		$protocol = call_user_func_array($this->protocolAsserterFactory, array($this->generator));

		return $protocol->setParentAsserter($this);
	}

	public function body()
	{
		$body = call_user_func_array($this->bodyAsserterFactory, array($this->generator));

		return $body->setParentAsserter($this);
	}

	public function headers()
	{
		$body = call_user_func_array($this->headersAsserterFactory, array($this->generator));

		return $body->setParentAsserter($this);
	}
} 
