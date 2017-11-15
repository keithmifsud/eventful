<?php
/**
 * This file is part of Eventful
 *
 * @licence   Please view the Licence file supplied with this source code.
 *
 * @author    Keith Mifsud <http://www.keith-mifsud.me>
 *
 * @copyright Keith Mifsud 2017 <mifsud.k@gmail.com>
 *
 * @since     1.0
 * @version   1.0 Initial Release
 */

namespace Eventful\Test\Unit\Model\Domain\Adaptor;

use Eventful\Common\Adaptor\Enumerator;
use Eventful\Common\Adaptor\EnumeratorAdaptorContract;
use Eventful\Test\TestCase;


/**
 * Tests for the enumerator adaptor.
 *
 */
class EnumeratorTest extends TestCase
{


    /**
     * Tests that the adaptor implements the contract.
     *
     * @test
     */
    public function it_implements_the_adaptor_interface()
    {
        $extended = new TestableEnumerator('tested');
        $this->assertInstanceOf(
            EnumeratorAdaptorContract::class,
            $extended
        );
    }


    /**
     * Tests that it can get the value statically.
     *
     * @test
     */
    public function it_can_get_the_value_statically()
    {
        $tested = new TestableEnumerator('tested');
        $this->assertEquals(
            'tested',
            $tested::TESTED
        );
    }


    /**
     * Tests that it can get the value from the instance.
     *
     * @test
     */
    public function it_can_get_the_value()
    {
        $tested = new TestableEnumerator('tested');
        $this->assertEquals(
            'tested',
            $tested->getValue()
        );
    }


    /**
     * Tests that it can get the string value.
     *
     * @test
     */
    public function it_can_get_the_string_value()
    {
        $notTested = new TestableEnumerator('not_tested');
        $this->assertEquals(
            'not_tested',
            $notTested->toString()
        );
    }


    /**
     * Tests that it throws an exception when initiated with an undefined
     * constant value.
     *
     * @test
     * @expectedException \Eventful\Common\Exception\UndefinedEnumeratorValue
     */
    public function it_throws_exception_when_initiated_with_an_undefined_value(
    ) {
        $undefined = new TestableEnumerator('undefined');
    }
}
