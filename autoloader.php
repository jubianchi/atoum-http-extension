<?php
namespace mageekguy\atoum\http;

use mageekguy\atoum;

atoum\autoloader::get()
	->addNamespaceAlias('atoum\http', __NAMESPACE__)
	->addDirectory(__NAMESPACE__, __DIR__ . DIRECTORY_SEPARATOR . 'classes');
;
