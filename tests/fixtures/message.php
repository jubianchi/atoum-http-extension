<?php

namespace mageekguy\atoum\http\tests\fixtures;

use Psr\Http\Message\MessageInterface;

class message implements MessageInterface
{
	private $protocol;
	private $headers;
	private $body;

	public function __construct($protocol, array $headers, body $body)
	{
		$this->protocol = $protocol;
		$this->headers = $headers;
		$this->body = $body;
	}

	public function getProtocolVersion()
	{
		return $this->protocol;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function getHeaders()
	{
		return $this->headers;
	}

	public function hasHeader($header)
	{
		return array_key_exists($header, $this->headers);
	}

	public function getHeader($header)
	{
		if ($this->hasHeader($header) === false)
		{
			throw new \invalidArgumentException;
		}

		return $this->headers[$header];
	}

	public function getHeaderAsArray($header)
	{
		return $this->headers;
	}
} 
