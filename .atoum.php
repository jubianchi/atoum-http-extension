<?php

$runner->addExtension(new \mageekguy\atoum\http\extension($script));

$script
    ->noCodeCoverageForClasses('mageekguy\atoum\asserter')
    ->noCodeCoverageForNamespaces('mageekguy\atoum\asserters')
;
