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

use Eventful\Domain\Exception\NotInteger;
use Eventful\Domain\ValueObject\IntegerValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;


/**
 * Tests for the integer value object.
 */
class IntegerValueObjectTest extends TestCase
{


    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $integerValueObject = new IntegerValueObject(567);
        $this->assertInstanceOf(
            ValueObject::class,
            $integerValueObject
        );
    }


    /**
     * Tests that it can be instantiated from an integer.
     *
     * @test
     */
    public function it_can_be_initiated_from_an_integer()
    {
        $integerValueObject = new IntegerValueObject(3);
        $this->assertInstanceOf(
            IntegerValueObject::class,
            $integerValueObject
        );
    }


    /**
     * Tests that it can get the correct value and type.
     *
     * @test
     */
    public function it_can_get_the_correct_value()
    {
        $integerValueObject = new IntegerValueObject(300);
        $this->assertTrue(is_int($integerValueObject->getValue()));
        $this->assertEquals(
            300,
            $integerValueObject->getValue()
        );
    }


    /**
     * Tests that an exception is throw when instantiated with a string.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotInteger
     */
    public function it_throws_exception_when_instantiated_from_a_string()
    {
        $integerValueObject = new IntegerValueObject('string');
    }


    /**
     * Tests that an exception is throw when instantiated with an array.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotInteger
     */
    public function it_throws_exception_when_instantiated_from_an_array()
    {
        $integerValueObject = new IntegerValueObject([]);
    }


    /**
     * Tests that an exception is throw when instantiated with a float.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotInteger
     */
    public function it_throws_exception_when_instantiated_from_a_float()
    {
        $integerValueObject = new IntegerValueObject(100.1);
    }


    /**
     * Tests that an exception is throw when instantiated with an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotInteger
     */
    public function it_throws_exception_when_instantiated_from_an_object()
    {
        $integerValueObject = new IntegerValueObject((object)[]);
    }


    /**
     * Tests that an exception is throw when instantiated with a null value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotInteger
     */
    public function it_throws_exception_when_instantiated_from_null()
    {
        $integerValueObject = new IntegerValueObject(null);
    }


    /**
     * Tests that it can get the correct value in integer type.
     *
     * @test
     */
    public function it_can_get_the_correct_integer_value()
    {
        $integerValueObject = new IntegerValueObject(3000);
        $this->assertTrue(is_int($integerValueObject->toInteger()));
        $this->assertEquals(
            3000,
            $integerValueObject->toInteger()
        );
    }


    /**
     * Tests that it knows when compared object has the same value.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_the_same_value()
    {
        $original = new IntegerValueObject(234);
        $compare = new IntegerValueObject(234);
        $this->assertTrue(
            $original->sameValueAs($compare)
        );
        $this->assertTrue(
            $compare->sameValueAs($original)
        );
    }


    /**
     * Tests that it knows value is different when compared
     * to an object of a different value.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_different_value()
    {
        $original = new IntegerValueObject(9877);
        $compare = new IntegerValueObject(9876);
        $this->assertFalse(
            $original->sameValueAs($compare)
        );
        $this->assertFalse(
            $compare->sameValueAs($original)
        );
    }

}
