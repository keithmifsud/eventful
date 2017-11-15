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

namespace Eventful\Test\Unit\Model\Domain\ValueObject;

use Eventful\Domain\ValueObject\EnumValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;
use function Sodium\compare;


/**
 * Tests for the enumerator value object.
 *
 */
class EnumValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $enumObject = new TestableEnumValueObject('tested');
        $this->assertInstanceOf(
            ValueObject::class,
            $enumObject
        );
    }


    /**
     * Tests that it can the value in string format.
     *
     * @test
     */
    public function it_can_get_the_value_as_a_string()
    {
        $enumObject = new TestableEnumValueObject('tested');
        $this->assertTrue(
            is_string($enumObject->toString())
        );
    }


    /**
     * Tests that it can get the value.
     *
     * @test
     */
    public function test_that_it_can_get_the_value()
    {
        $enumObject = new TestableEnumValueObject('not_tested');
        $this->assertEquals(
            'not_tested',
            $enumObject->getValue()
        );
    }


    /**
     * Tests that tit knows when comparing two nonidentical objects.
     *
     * @test
     */
    public function it_knows_when_compared_object_has_a_different_value()
    {
        $original = new TestableEnumValueObject('tested');
        $compare = new TestableEnumValueObject('not_tested');

        $this->assertFalse(
            $original->sameValueAs($compare)
        );

        $this->assertFalse(
            $compare->sameValueAs($original)
        );
    }


    /**
     * It knows when compared to an object of same value.
     *
     * @test
     */
    public function it_knows_when_compared_object_has_same_value()
    {
        $original = new TestableEnumValueObject('not_tested');
        $compare = new TestableEnumValueObject('not_tested');

        $this->assertTrue(
            $original->sameValueAs($compare)
        );

        $this->assertTrue(
            $compare->sameValueAs($original)
        );
    }
}
