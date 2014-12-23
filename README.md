![atoum](http://downloads.atoum.org/images/logo.png)

[atoum](http://atoum.org/) is a **simple**, **modern** and **intuitive** unit
testing framework for PHP!

# atoum/http-extension [![build status](https://travis-ci.org/atoum/http-extension.svg?branch=master)](https://travis-ci.org/atoum/http-extension)

This extension helps to assert on HTTP request and response based on the [PSR
HTTP message interfaces](https://github.com/php-fig/fig-standards/blob/master/proposed/http-message.md).


## TODO

* ~~`request` asserter derivating form the `message` asserter~~
    * `url` child asserter (see [parse_url](http://fr.php.net/manual/fr/function.parse-url.php))
    * ~~`method` child asserter~~
* `incomingRequest` asserter derivating form the `request` asserter
    * `params` child asserter
    * `cookies` child asserter
    * `files` child asserter
    * `attributes` child asserter
* ~~`response` asserter derivating form the `message` asserter~~
    * ~~`status` child asserter~~
    * `reason` child asserter
