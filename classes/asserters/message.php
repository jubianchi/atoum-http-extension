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
        $generator = $this->generator;
        $test = & $this->test;

        $this->protocolAsserterFactory = $factory ?: function() use ($generator, & $test) {
            $protocol = new protocol($generator);

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
        $generator = $this->generator;
        $test = & $this->test;

        $this->bodyAsserterFactory = $factory ?: function() use ($generator, & $test) {
            $body = new body($generator);

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
        $generator = $this->generator;
        $test = & $this->test;

        $this->headersAsserterFactory = $factory ?: function() use ($generator, & $test) {
            $headers = new headers($generator);

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
        $protocol = call_user_func($this->protocolAsserterFactory);

        return $protocol->setParentAsserter($this);
    }

    public function body()
    {
        $body = call_user_func($this->bodyAsserterFactory);

        return $body->setParentAsserter($this);
    }

    public function headers()
    {
        $body = call_user_func($this->headersAsserterFactory);

        return $body->setParentAsserter($this);
    }
} 
