<?php

namespace mageekguy\atoum\http\tests\fixtures;


class body
{
	protected $contents;

	public function __construct($contents)
	{
		$this->contents = $contents;
	}

	public function __toString()
	{
		return $this->contents;
	}
} 
