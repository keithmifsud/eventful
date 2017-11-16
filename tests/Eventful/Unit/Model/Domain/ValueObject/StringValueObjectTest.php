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

use Eventful\Domain\Exception\NotString;
use Eventful\Domain\ValueObject\StringValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;


/**
 * Tests for the string value object.
 */
class StringValueObjectTest extends TestCase
{


    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $object = new StringValueObject('some string');
        $this->assertInstanceOf(
            ValueObject::class,
            $object
        );
    }


    /**
     * Tests that it can be created from a string.
     *
     * @test
     */
    public function it_can_be_created_from_a_string()
    {
        $object = new StringValueObject('some string');
        $this->assertInstanceOf(
            StringValueObject::class,
            $object
        );
    }


    /**
     * It throws an exception when passing an array.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotString
     */
    public function it_throws_exception_when_not_initiated_with_an_array()
    {
        $object = new StringValueObject([]);
    }


    /**
     * It throws exception when instantiated with an integer.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotString
     */
    public function it_throws_exception_when_instantiated_from_an_integer()
    {
        $stringValueObject = new StringValueObject(100);
    }


    /**
     * It throws exception when instantiated with a float.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotString
     */
    public function it_throws_exception_when_instantiated_from_a_float()
    {
        $stringValueObject = new StringValueObject(1.9999);
    }


    /**
     * It throws exception when instantiated with an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotString
     */
    public function it_throws_exception_when_instantiated_from_an_object()
    {
        $stringValueObject = new StringValueObject((object) []);
    }


    /**
     * It throws exception when instantiated with a null value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotString
     */
    public function it_throws_exception_when_instantiated_from_null()
    {
        $stringValueObject = new StringValueObject(null);
    }

    /**
     * Tests that it can get the string.
     *
     * @test
     */
    public function it_can_get_the_string()
    {
        $string = 'some text';
        $object = new StringValueObject($string);
        $this->assertTrue(
            is_string($object->getValue())
        );
    }


    /**
     * Tests that it knows when comparing a different string.
     *
     * @test
     */
    public function it_knows_when_a_compared_string_has_a_different_value()
    {
        $original = new StringValueObject('some string');
        $compare = new StringValueObject('different string');

        $this->assertFalse(
            $original->sameValueAs($compare)
        );
    }


    /**
     * Tests that it knows when comparing an string of the same value.
     *
     * @test
     */
    public function it_knows_when_another_string_has_the_same_value()
    {
        $original = new StringValueObject('a string');
        $compare = new StringValueObject('a string');

        $this->assertTrue(
            $original->sameValueAs($compare)
        );
    }
}
