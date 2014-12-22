<?php

namespace mageekguy\atoum\http\tests;

use mageekguy\atoum\adapter;
use mageekguy\atoum\annotations;
use mageekguy\atoum\asserter;
use mageekguy\atoum\test;

class functional extends test
{
    public function __construct(adapter $adapter = null, annotations\extractor $annotationExtractor = null, asserter\generator $asserterGenerator = null, test\assertion\manager $assertionManager = null, \closure $reflectionClassFactory = null)
    {
        $this->setTestNamespace('#(?:^|\\\)tests?\\\functionals?\\\#i');

        parent::__construct($adapter, $annotationExtractor, $asserterGenerator, $assertionManager, $reflectionClassFactory);
    }
} 
