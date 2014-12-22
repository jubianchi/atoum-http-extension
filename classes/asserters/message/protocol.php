<?php

namespace mageekguy\atoum\http\asserters\message;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class protocol extends string
{
	protected $message;

	public function __call($method, $arguments)
	{
		return call_user_func_array(array($this->message, $method), $arguments);
	}

	public function __get($asserter)
	{
		return $this->message->__get($asserter);
	}

	public function setParentAsserter(atoum\http\asserters\message $message)
	{
		$this->message = $message;

		return $this->setWith($this->message->getValue()->getProtocolVersion());
	}

    public function isGreaterThan($version, $failMessage = null)
    {
        $compare = version_compare($this->message->getValue()->getProtocolVersion(), $version);

        switch ($compare)
        {
            case 0:
                $this->fail($failMessage ?: $this->_(
                    'Protocol version %s is equal to %s',
                    $this->message->getValue()->getProtocolVersion(),
                    $version
                ));

            case -1:
                $this->fail($failMessage ?: $this->_(
                    'Protocol version %s is lower than %s',
                    $this->message->getValue()->getProtocolVersion(),
                    $version
                ));

            default:
                return $this->pass();
        }
    }

    public function isLowerThan($version, $failMessage = null)
    {
        $compare = version_compare($this->message->getValue()->getProtocolVersion(), $version);

        switch ($compare)
        {
            case 0:
                $this->fail($failMessage ?: $this->_(
                    'Protocol version %s is equal to %s',
                    $this->message->getValue()->getProtocolVersion(),
                    $version
                ));

            case 1:
                $this->fail($failMessage ?: $this->_(
                    'Protocol version %s is greater than %s',
                    $this->message->getValue()->getProtocolVersion(),
                    $version
                ));

            default:
                return $this->pass();
        }

        return $this;
    }
} 
