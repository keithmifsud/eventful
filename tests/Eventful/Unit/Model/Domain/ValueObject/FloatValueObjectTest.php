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

use Eventful\Test\TestCase;
use Eventful\Domain\Exception\NotFloat;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\ValueObject\FloatValueObject;


/**
 * Tests for the float value object.
 */
class FloatValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $floatValueObject = new FloatValueObject(123.123456);
        $this->assertInstanceOf(
            ValueObject::class,
            $floatValueObject
        );
    }


    /**
     * Tests that it can be initiated from a float.
     *
     * @test
     */
    public function it_can_be_initiated_from_a_float()
    {
        $floatValueObject = new FloatValueObject(123.123456);
        $this->assertInstanceOf(
            FloatValueObject::class,
            $floatValueObject
        );
    }


    /**
     * Tests that it can be initiated from a double.
     *
     * @test
     */
    public function it_can_be_initiated_from_a_double()
    {
        $floatValueObject = new FloatValueObject(123.12);
        $this->assertInstanceOf(
            FloatValueObject::class,
            $floatValueObject
        );
    }


    /**
     * Tests that it can get the correct value and type.
     *
     * @test
     */
    public function it_can_get_the_correct_value_and_type()
    {
        $floatValueObject = new FloatValueObject(123.123456);
        $this->assertTrue(
            is_float($floatValueObject->toFloat())
        );
        $this->assertEquals(
            123.123456,
            $floatValueObject->getValue()
        );
    }


    /**
     * It throws exception when initiated from an integer.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotFloat
     */
    public function it_throws_exception_when_instantiated_from_an_integer()
    {
        $floatValueObject = new FloatValueObject(123);
    }


    /**
     * It throws exception when initiated from a string.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotFloat
     */
    public function it_throws_exception_when_instantiated_from_a_string()
    {
        $floatValueObject = new FloatValueObject('string');
    }


    /**
     * It throws exception when initiated from an array.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotFloat
     */
    public function it_throws_exception_when_instantiated_from_an_array()
    {
        $floatValueObject = new FloatValueObject([]);
    }


    /**
     * It throws exception when initiated from an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotFloat
     */
    public function it_throws_exception_when_instantiated_from_an_object()
    {
        $floatValueObject = new FloatValueObject((object)[]);
    }


    /**
     * It throws exception when initiated from a null value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotFloat
     */
    public function it_throws_exception_when_instantiated_from_null()
    {
        $floatValueObject = new FloatValueObject(null);
    }


    /**
     * It knows that the compared object has the same value when it does.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_the_same_value()
    {
        $original = new FloatValueObject(90.09);
        $sameValue = new FloatValueObject(90.09);
        $this->assertTrue(
            $original->sameValueAs($sameValue)
        );
        $this->assertTrue(
            $sameValue->sameValueAs($original)
        );
    }


    /**
     * It knows that the compared object has a different value when it does.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_a_different_value()
    {
        $original = new FloatValueObject(45.67);
        $different = new FloatValueObject(67.45);
        $this->assertFalse(
            $original->sameValueAs($different)
        );
        $this->assertFalse(
            $different->sameValueAs($original)
        );
    }
}
