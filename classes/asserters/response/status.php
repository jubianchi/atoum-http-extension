<?php

namespace mageekguy\atoum\http\asserters\response;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\integer;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class status extends integer
{
	protected $message;

	public function __call($method, $arguments)
	{
        switch (strtolower($method))
        {
            case 'isnoveltyimplementation':
            case 'isedgecase':
            case 'ispredictableproblem':
                return call_user_func_array(array($this, $method . 's'), $arguments);

            default:
                return call_user_func_array(array($this->message, $method), $arguments);
        }
	}

	public function __get($asserter)
	{
        switch (strtolower($asserter))
        {
            case 'isinformational':
            case 'issuccess':
            case 'isredirection':
            case 'isclienterror':
            case 'isservererror':
            case 'isinexcusable':
            case 'isnoveltyimplementations':
            case 'isnoveltyimplementation':
            case 'isedgecases':
            case 'isedgecase':
            case 'isfucking':
            case 'ismemedriven':
            case 'issyntaxerror':
            case 'issubstanceaffecteddeveloper':
            case 'ispredictableproblems':
            case 'ispredictableproblem':
            case 'issomebodyelsesproblem':
            case 'isinternetcrashed':
                return $this->{$asserter}();

            default:
                return $this->message->__get($asserter);
        }
	}

	public function setParentAsserter(atoum\http\asserters\response $message)
	{
		$this->message = $message;

		return $this->setWith($this->message->getValue()->getStatusCode());
	}

    public function isBetween($lower, $upper, $failMessage = null)
    {
        if ($this->valueIsSet()->value < $lower || $this->valueIsSet()->value > $upper)
        {
            $this->fail($failMessage ?: $this->_('%d is not between %s and %s', $this->valueIsSet()->value, $lower, $upper));
        }

        return $this->pass();
    }

    public function isInformational($failMessage = null)
    {
        return $this->isBetween(100, 199, $failMessage ?: $this->_('%d is not an informational status', $this->valueIsSet()->value));
    }

    public function isSuccess($failMessage = null)
    {
        return $this->isBetween(200, 299, $failMessage ?: $this->_('%d is not a success status', $this->valueIsSet()->value));
    }

    public function isRedirection($failMessage = null)
    {
        return $this->isBetween(300, 399, $failMessage ?: $this->_('%d is not a redirection status', $this->valueIsSet()->value));
    }

    public function isClientError($failMessage = null)
    {
        return $this->isBetween(400, 499, $failMessage ?: $this->_('%d is not a client error status', $this->valueIsSet()->value));
    }

    public function isServerError($failMessage = null)
    {
        return $this->isBetween(500, 599, $failMessage ?: $this->_('%d is not a server error status', $this->valueIsSet()->value));
    }

    public function isInexcusable($failMessage = null)
    {
        return $this->isBetween(700, 709, $failMessage ?: $this->_('%d is not an inexcusable status', $this->valueIsSet()->value));
    }

    public function isNoveltyImplementations($failMessage = null)
    {
        return $this->isBetween(710, 719, $failMessage ?: $this->_('%d is not a novelty implementation status', $this->valueIsSet()->value));
    }

    public function isEdgeCases($failMessage = null)
    {
        return $this->isBetween(720, 729, $failMessage ?: $this->_('%d is not an edge case status', $this->valueIsSet()->value));
    }

    public function isFucking($failMessage = null)
    {
        return $this->isBetween(730, 739, $failMessage ?: $this->_('%d is not a fucking status', $this->valueIsSet()->value));
    }

    public function isMemeDriven($failMessage = null)
    {
        return $this->isBetween(740, 749, $failMessage ?: $this->_('%d is not a meme driven status', $this->valueIsSet()->value));
    }

    public function isSyntaxError($failMessage = null)
    {
        return $this->isBetween(750, 759, $failMessage ?: $this->_('%d is not a syntax error status', $this->valueIsSet()->value));
    }

    public function isSubstanceAffectedDeveloper($failMessage = null)
    {
        return $this->isBetween(760, 769, $failMessage ?: $this->_('%d is not a substance affected developer status', $this->valueIsSet()->value));
    }

    public function isPredictableProblems($failMessage = null)
    {
        return $this->isBetween(770, 779, $failMessage ?: $this->_('%d is not a predictable problem status', $this->valueIsSet()->value));
    }

    public function isSomebodyElsesProblem($failMessage = null)
    {
        return $this->isBetween(780, 789, $failMessage ?: $this->_('%d is not a somebody else\'s problem status', $this->valueIsSet()->value));
    }

    public function isInternetCrashed($failMessage = null)
    {
        return $this->isBetween(790, 799, $failMessage ?: $this->_('%d is not an internet crashed status', $this->valueIsSet()->value));
    }
} 
