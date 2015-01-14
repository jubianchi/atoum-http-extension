<?php

namespace mageekguy\atoum\http\asserters;

use mageekguy\atoum\asserter;
use mageekguy\atoum\test;
use mageekguy\atoum\tools;
use mageekguy\atoum;
use mageekguy\atoum\http\asserters\request\method;
use mageekguy\atoum\http\asserters\request\url;
use Psr\Http\Message\OutgoingRequestInterface;
use Psr\Http\Message\IncomingRequestInterface;

class request extends message
{
    protected $methodAsserterFactory;
    protected $urlAsserterFactory;

    public function __construct(asserter\generator $generator = null, tools\variable\analyzer $analyzer = null, atoum\locale $locale = null)
    {
        parent::__construct($generator, $analyzer, $locale);

        $this
            ->setMethodAsserterFactory()
            ->setUrlAsserterFactory()
        ;
    }

    public function __get($property)
	{
		switch (strtolower($property))
		{
			case 'method':
			case 'url':
				return $this->{$property}();

			default:
				return parent::__get($property);
		}
	}

    public function setMethodAsserterFactory(\closure $factory = null)
	{
		$factory = $factory ?: function(asserter\generator $generator) {
			return new method($generator);
		};

		$generator = $this->generator;
		$test = & $this->test;

		$this->methodAsserterFactory = function() use ($generator, $factory, & $test) {
			$protocol = $factory($generator);

			if ($test !== null)
			{
				$protocol->setWithTest($test);
			}

			return $protocol;
		};

		return $this;
	}

    public function setUrlAsserterFactory(\closure $factory = null)
	{
		$factory = $factory ?: function(asserter\generator $generator) {
			return new url($generator);
		};

		$generator = $this->generator;
		$test = & $this->test;

		$this->urlAsserterFactory = function() use ($generator, $factory, & $test) {
			$protocol = $factory($generator);

			if ($test !== null)
			{
				$protocol->setWithTest($test);
			}

			return $protocol;
		};

		return $this;
	}

	public function setWith($value, $checkType = true)
	{
		parent::setWith($value, $checkType);

		if ($checkType === true && $value instanceof OutgoingRequestInterface === false && $value instanceof IncomingRequestInterface === false)
		{
			$this->fail($this->_(sprintf('%s is not a valid HTTP request', $this)));
		}

		return $this;
	}

    public function method()
    {
        $method = call_user_func_array($this->methodAsserterFactory, array($this->generator));

        return $method->setParentAsserter($this);
    }

    public function url()
    {
        $url = call_user_func_array($this->urlAsserterFactory, array($this->generator));

        return $url->setParentAsserter($this);
    }
} 
