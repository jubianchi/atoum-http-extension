<?php

namespace mageekguy\atoum\http\tests\units\asserters\response;

use atoum;
use mageekguy\atoum\http\asserters\response;

class status extends atoum
{
	public function testClass()
	{
		$this
			->testedClass
				->extends('mageekguy\atoum\asserters\integer')
		;
	}

	public function testSetParentAsserter()
	{
		$this
			->given(
				$this->newTestedInstance,
				$message = new response(),
				$response = new \mock\Psr\Http\Message\IncomingResponseInterface
			)
			->if(
				$this->calling($response)->getStatusCode = rand(0, PHP_INT_MAX),
				$message->setWith($response)
			)
			->then
				->object($this->testedInstance->setParentAsserter($message))->isTestedInstance
                ->mock($response)
                    ->call('getStatusCode')->once
		;
	}

    public function testIsInformational()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(0, 99),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isInformational;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(100, 199),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isInformational)->isTestedInstance
                ->object($this->testedInstance->isInformational())->isTestedInstance
        ;
    }

    public function testIsSuccess()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(100, 199),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isSuccess;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(200, 299),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isSuccess)->isTestedInstance
                ->object($this->testedInstance->isSuccess())->isTestedInstance
        ;
    }

    public function testIsRedirection()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(200, 299),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isRedirection;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(300, 399),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isRedirection)->isTestedInstance
                ->object($this->testedInstance->isRedirection())->isTestedInstance
        ;
    }

    public function testIsClientError()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(300, 399),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isClientError;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(400, 499),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isClientError)->isTestedInstance
                ->object($this->testedInstance->isClientError())->isTestedInstance
        ;
    }

    public function testIsServerError()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(400, 499),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isServerError;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(500, 599),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isServerError)->isTestedInstance
                ->object($this->testedInstance->isServerError())->isTestedInstance
        ;
    }

    public function testIsInexcusable()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(500, 699),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isInexcusable;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(700, 709),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isInexcusable)->isTestedInstance
                ->object($this->testedInstance->isInexcusable())->isTestedInstance
        ;
    }

    public function testIsNoveltyImplementations()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(700, 709),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isNoveltyImplementations;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(710, 719),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isNoveltyImplementations)->isTestedInstance
                ->object($this->testedInstance->isNoveltyImplementations())->isTestedInstance
        ;
    }

    public function testIsEdgeCases()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(710, 719),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isEdgeCases;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(720, 729),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isEdgeCases)->isTestedInstance
                ->object($this->testedInstance->isEdgeCases())->isTestedInstance
        ;
    }

    public function testIsFucking()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(720, 729),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isFucking;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(730, 739),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isFucking)->isTestedInstance
                ->object($this->testedInstance->isFucking())->isTestedInstance
        ;
    }

    public function testIsMemeDriven()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(730, 739),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isMemeDriven;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(740, 749),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isMemeDriven)->isTestedInstance
                ->object($this->testedInstance->isMemeDriven())->isTestedInstance
        ;
    }

    public function testIsSyntaxError()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(740, 749),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isSyntaxError;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(750, 759),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isSyntaxError)->isTestedInstance
                ->object($this->testedInstance->isSyntaxError())->isTestedInstance
        ;
    }

    public function testIsSubstanceAffectedDeveloper()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(750, 759),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isSubstanceAffectedDeveloper;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(760, 769),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isSubstanceAffectedDeveloper)->isTestedInstance
                ->object($this->testedInstance->isSubstanceAffectedDeveloper())->isTestedInstance
        ;
    }

    public function testIsPredictableProblems()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(760, 769),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isPredictableProblems;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(770, 779),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isPredictableProblems)->isTestedInstance
                ->object($this->testedInstance->isPredictableProblems())->isTestedInstance
        ;
    }

    public function testIsSomebodyElsesProblem()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(770, 779),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isSomebodyElsesProblem;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(780, 789),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isSomebodyElsesProblem)->isTestedInstance
                ->object($this->testedInstance->isSomebodyElsesProblem())->isTestedInstance
        ;
    }

    public function testIsInternetCrashed()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $message = new response(),
                $request = new \mock\Psr\Http\Message\IncomingResponseInterface
            )
            ->if(
                $this->calling($request)->getStatusCode = rand(780, 789),
                $message->setWith($request),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->exception(function($test) {
                        $test->testedInstance->isInternetCrashed;
                    }
                )
                    ->isInstanceOf('mageekguy\atoum\asserter\exception')
            ->if(
                $this->calling($request)->getStatusCode = rand(790, 799),
                $this->testedInstance->setParentAsserter($message)
            )
            ->then
                ->object($this->testedInstance->isInternetCrashed)->isTestedInstance
                ->object($this->testedInstance->isInternetCrashed())->isTestedInstance
        ;
    }
} 
