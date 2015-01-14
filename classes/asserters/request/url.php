<?php

namespace mageekguy\atoum\http\asserters\request;

use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters\string;
use mageekguy\atoum\exceptions;
use mageekguy\atoum\http\asserters\request\url;
use mageekguy\atoum\tools;
use mageekguy\atoum;

class url extends string
{
    protected $schemeAsserterFactory;
    protected $hostAsserterFactory;
    protected $portAsserterFactory;
    protected $userAsserterFactory;
    protected $passwordAsserterFactory;
    protected $pathAsserterFactory;
    protected $queryAsserterFactory;
    protected $fragmentAsserterFactory;
	protected $request;

    public function __construct(asserter\generator $generator = null, tools\variable\analyzer $analyzer = null, atoum\locale $locale = null)
    {
        parent::__construct($generator, $analyzer, $locale);

        $this
            ->setSchemeAsserterFactory()
            ->setHostAsserterFactory()
            ->setPortAsserterFactory()
            ->setUserAsserterFactory()
            ->setPasswordAsserterFactory()
            ->setPathAsserterFactory()
            ->setQueryAsserterFactory()
            ->setFragmentAsserterFactory()
        ;
    }

    public function __call($method, $arguments)
	{
        return call_user_func_array(array($this->request, $method), $arguments);
	}

	public function __get($asserter)
	{
        switch (strtolower($asserter))
        {
            case 'pass':
                $asserter = 'password';

            case 'scheme':
            case 'host':
            case 'port':
            case 'user':
            case 'password':
            case 'path':
            case 'query':
            case 'fragment':
                return $this->{$asserter}();

            default:
                return $this->request->__get($asserter);
        }
	}

	public function setParentAsserter(atoum\http\asserters\request $request)
	{
		$this->request = $request;

		return $this->setWith($this->request->getValue()->getUrl());
	}

    public function setSchemeAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\scheme($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->schemeAsserterFactory = function() use ($generator, $factory, & $test) {
            $scheme = $factory($generator);

            if ($this->test !== null)
            {
                $scheme->setWithTest($this->test);
            }

            return $scheme;
        };

        return $this;
    }

    public function setHostAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\host($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->hostAsserterFactory = function() use ($generator, $factory, & $test) {
            $host = $factory($generator);

            if ($this->test !== null)
            {
                $host->setWithTest($this->test);
            }

            return $host;
        };

        return $this;
    }

    public function setPortAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\port($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->portAsserterFactory = function() use ($generator, $factory, & $test) {
            $port = $factory($generator);

            if ($this->test !== null)
            {
                $port->setWithTest($this->test);
            }

            return $port;
        };

        return $this;
    }

    public function setUserAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\user($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->userAsserterFactory = function() use ($generator, $factory, & $test) {
            $user = $factory($generator);

            if ($this->test !== null)
            {
                $user->setWithTest($this->test);
            }

            return $user;
        };

        return $this;
    }

    public function setPasswordAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\password($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->passwordAsserterFactory = function() use ($generator, $factory, & $test) {
            $password = $factory($generator);

            if ($this->test !== null)
            {
                $password->setWithTest($this->test);
            }

            return $password;
        };

        return $this;
    }

    public function setPathAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\path($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->pathAsserterFactory = function() use ($generator, $factory, & $test) {
            $path = $factory($generator);

            if ($this->test !== null)
            {
                $path->setWithTest($this->test);
            }

            return $path;
        };

        return $this;
    }

    public function setQueryAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\query($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->queryAsserterFactory = function() use ($generator, $factory, & $test) {
            $query = $factory($generator);

            if ($this->test !== null)
            {
                $query->setWithTest($this->test);
            }

            return $query;
        };

        return $this;
    }

    public function setFragmentAsserterFactory(\closure $factory = null)
    {
        $factory = $factory ?: function(asserter\generator $generator) {
            return new url\fragment($generator);
        };

        $generator = $this->generator;
        $test = & $this->test;

        $this->fragmentAsserterFactory = function() use ($generator, $factory, & $test) {
            $fragment = $factory($generator);

            if ($this->test !== null)
            {
                $fragment->setWithTest($this->test);
            }

            return $fragment;
        };

        return $this;
    }
    
    public function scheme()
    {
        $scheme = call_user_func_array($this->schemeAsserterFactory, array($this->generator));

        return $scheme->setParentAsserter($this);
    }

    public function host()
    {
        $host = call_user_func_array($this->hostAsserterFactory, array($this->generator));

        return $host->setParentAsserter($this);
    }

    public function port()
    {
        $port = call_user_func_array($this->portAsserterFactory, array($this->generator));

        return $port->setParentAsserter($this);
    }

    public function user()
    {
        $user = call_user_func_array($this->userAsserterFactory, array($this->generator));

        return $user->setParentAsserter($this);
    }

    public function password()
    {
        $password = call_user_func_array($this->passwordAsserterFactory, array($this->generator));

        return $password->setParentAsserter($this);
    }

    public function path()
    {
        $path = call_user_func_array($this->pathAsserterFactory, array($this->generator));

        return $path->setParentAsserter($this);
    }

    public function query()
    {
        $query = call_user_func_array($this->queryAsserterFactory, array($this->generator));

        return $query->setParentAsserter($this);
    }

    public function fragment()
    {
        $fragment = call_user_func_array($this->fragmentAsserterFactory, array($this->generator));

        return $fragment->setParentAsserter($this);
    }
} 
