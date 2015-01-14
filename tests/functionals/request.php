<?php

namespace mageekguy\atoum\http\tests\functionals\tests\fixtures;

use mageekguy\atoum\http\tests\fixtures\body;
use mageekguy\atoum\http\tests\functional;

class request extends functional
{
	public function testScheme()
	{
		$this
			->given(
				$url = 'http://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->scheme->isHttp
			->if(
				$url = 'https://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->scheme->isHttps
		;
	}

	public function testUser()
	{
		$this
			->given(
				$url = 'http://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->user->isEmpty
			->if(
				$user = uniqid(),
				$url = 'http://' . $user . '@' . uniqid(),
				$this->testedInstance->setUrl($url)
			)
			->then
				->request($this->testedInstance)
					->url->user->isEqualTo($user)
		;
	}

	public function testPassword()
	{
		$this
			->given(
				$url = 'http://' . uniqid() . '@' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->password->isEmpty
			->if(
				$password = uniqid(),
				$url = 'http://' . uniqid() . ':' . $password . '@' . uniqid(),
				$this->testedInstance->setUrl($url)
			)
			->then
				->request($this->testedInstance)
					->url->password->isEqualTo($password)
		;
	}

	public function testHost()
	{
		$this
			->given(
				$host = uniqid(),
				$url = 'http://' . $host,
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->host->isEqualTo($host)
		;
	}

	public function testPort()
	{
		$this
			->given(
				$port = rand(1, 65536),
				$url = 'http://' . uniqid() . ':' . $port,
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->port->isEqualTo($port)
		;
	}

	public function testPath()
	{
		$this
			->given(
				$url = 'http://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->path->isEmpty
			->if(
				$path = '/' . uniqid(),
				$url = 'http://' . uniqid() . $path,
				$this->testedInstance->setUrl($url)
			)
			->then
				->request($this->testedInstance)
					->url->path->isEqualTo($path)
		;
	}

	public function testQuery()
	{
		$this
			->given(
				$url = 'http://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->query->isEmpty
			->if(
				$foo = uniqid(),
				$bar = uniqid(),
				$url = 'http://' . uniqid() . '?foo=' . $foo . '&bar=' . $bar,
				$this->testedInstance->setUrl($url)
			)
			->then
				->request($this->testedInstance)
					->url->query
						->string['foo']->isEqualTo($foo)
						->string['bar']->isEqualTo($bar)
		;
	}

	public function testFragment()
	{
		$this
			->given(
				$url = 'http://' . uniqid(),
				$this->newTestedInstance(uniqid(), array(), new body(uniqid()))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->url->fragment->isEmpty
			->if(
				$fragment = uniqid(),
				$url = 'http://' . uniqid() . '#' . $fragment,
				$this->testedInstance->setUrl($url)
			)
			->then
				->request($this->testedInstance)
					->url->fragment->isEqualTo($fragment)
		;
	}

	public function testAll()
	{
		$this
			->given(
				$protocol = uniqid(),
				$header = uniqid(),
				$value = uniqid(),
				$body = uniqid(),
				$scheme = 'ftp',
				$user = uniqid(),
				$password = uniqid(),
				$host = uniqid(),
				$port = rand(8000, 9000),
				$path = '/' . uniqid(),
				$foo = uniqid(),
				$bar = uniqid(),
				$fragment = uniqid(),
				$url = sprintf('%s://%s:%s@%s:%d%s?foo=%s&bar=%s#%s', $scheme, $user, $password, $host, $port, $path, $foo, $bar, $fragment),
				$this->newTestedInstance($protocol, array($header => $value), new body($body))
			)
			->if($this->testedInstance->setUrl($url))
			->then
				->request($this->testedInstance)
					->protocol->isEqualTo($protocol)
					->body->isEqualTo($body)
					->headers
						->string[$header]->isEqualTo($value)
					->url
						->isEqualTo($url)
						->contains($path)
						->scheme->isEqualTo('ftp')
						->user
							->isNotEmpty
							->isEqualTo($user)
						->password->isEqualTo($password)
						->host->isEqualTo($host)
						->port
							->isGreaterThan(8000)
							->isLessThan(9000)
						->path->isEqualTo($path)
						->query
							->string['foo']->isEqualTo($foo)
							->string['bar']->isEqualTo($bar)
						->fragment->isEqualTo($fragment)
		;
	}
} 
