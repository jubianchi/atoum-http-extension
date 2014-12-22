<?php

namespace mageekguy\atoum\http\tests\units;

use atoum;

class extension extends atoum
{
    public function testSetTest()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $test = new \mock\mageekguy\atoum\test,
                $generator = new \mock\mageekguy\atoum\asserter\generator
            )
            ->if($this->calling($test)->getAsserterGenerator = $generator)
            ->then
                ->object($this->testedInstance->settest($test))->isTestedInstance
                ->mock($generator)
                    ->call('addNamespace')->withArguments('mageekguy\atoum\http\asserters')->once
        ;
    }
} 
