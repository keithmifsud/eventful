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
use Eventful\Domain\Exception\NotDouble;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\ValueObject\DoubleValueObject;


/**
 * Tests for the double value object.
 */
class DoubleValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $doubleValueObject = new DoubleValueObject(123.12);
        $this->assertInstanceOf(
            ValueObject::class,
            $doubleValueObject
        );
    }


    /**
     * Tests that it can be instantiated from a double.
     *
     * @test
     */
    public function it_can_be_instantiated_from_double()
    {
        $doubleValueObject = new DoubleValueObject(123.12);
        $this->assertInstanceOf(
            DoubleValueObject::class,
            $doubleValueObject
        );
    }


    /**
     * Tests that it gets the correct value and type.
     *
     * @test
     */
    public function it_can_get_the_correct_value_and_type()
    {
        $doubleValueObject = new DoubleValueObject(123.12);
        $this->assertTrue(
            is_double($doubleValueObject->toDouble())
        );
        $this->assertEquals(
            123.12,
            $doubleValueObject->getValue()
        );
    }


    /**
     * It throws exception when instantiated with a float of mor ethan double.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_a_float_with_more_than_double_floats(
    )
    {

        $moreThanFloatValueObject = new DoubleValueObject(12.111);
    }


    /**
     * It throws exception when instantiated with an integer.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_an_integer()
    {

        $valueObjectWithIntegerValue = new DoubleValueObject(10);
    }


    /**
     * It throws exception when instantiated with a string.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_a_string()
    {

        $valueObjectWithStringValue = new DoubleValueObject('00.00');
    }


    /**
     * It throws exception when instantiated with an array.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_an_array()
    {

        $valueObjectWithIntegerValue = new DoubleValueObject(10);
    }


    /**
     * It throws exception when instantiated with an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_an_object()
    {

        $valueObjectWithIntegerValue = new DoubleValueObject((object)[]);
    }


    /**
     * It throws exception when instantiated with a null value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotDouble
     */
    public function it_throws_exception_when_instantiated_from_null()
    {

        $valueObjectWithIntegerValue = new DoubleValueObject(null);
    }


    /**
     * It knows that the compared object has the same value when it does.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_the_same_value()
    {
        $original = new DoubleValueObject(90.09);
        $sameValue = new DoubleValueObject(90.09);
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
        $original = new DoubleValueObject(45.67);
        $different = new DoubleValueObject(67.45);
        $this->assertFalse(
            $original->sameValueAs($different)
        );
        $this->assertFalse(
            $different->sameValueAs($original)
        );
    }
}
