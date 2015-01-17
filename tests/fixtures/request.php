<?php

namespace mageekguy\atoum\http\tests\fixtures;

use Psr\Http\Message\OutgoingRequestInterface;
use Psr\Http\Message\StreamableInterface;

class request extends message implements OutgoingRequestInterface
{
    protected $url;
    protected $method;
    protected $version;

    public function setProtocolVersion($version)
    {
        $this->version = $version;
    }

    public function setHeader($header, $value)
    {
        if (is_array($value))
        {
            $value = array($value);
        }

        $this->headers[$header] = $value;
    }

    public function addHeader($header, $value)
    {
        if (isset($this->headers[$header]) === false)
        {
            $this->headers[$header] = array();
        }

        $this->headers[$header][] = $value;
    }

    public function removeHeader($header)
    {
        if (isset($this->headers[$header]) === true)
        {
            unset($this->headers[$header]);
        }
    }

    public function setBody(StreamableInterface $body)
    {
        $this->body = $body->getContents();
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
} 
