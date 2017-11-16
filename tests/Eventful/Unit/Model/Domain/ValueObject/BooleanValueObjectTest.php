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

use Eventful\Domain\Exception\NotBoolean;
use Eventful\Domain\ValueObject\BooleanValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;


/**
 * Tests for the boolean value object.
 *
 */
class BooleanValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $booleanValueObject = new BooleanValueObject(true);
        $this->assertInstanceOf(
            ValueObject::class,
            $booleanValueObject
        );
    }


    /**
     * Tests that it can be created from a boolean value.
     *
     * @test
     */
    public function it_can_be_created_from_a_boolean_value()
    {
        $booleanValueObject = new BooleanValueObject(true);
        $this->assertInstanceOf(
            BooleanValueObject::class,
            $booleanValueObject
        );
    }


    /**
     * It throws exception when instantiated with a string value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_from_a_string_value()
    {
        $booleanValueObject = new BooleanValueObject('string');
    }


    /**
     * It throws exception when instantiated with a array value.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_from_an_array_value()
    {
        $booleanValueObject = new BooleanValueObject([]);
    }


    /**
     * It throws exception when instantiated from an integer.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_from_an_integer()
    {
        $booleanValueObject = new BooleanValueObject(100);
    }


    /**
     * It throws exception when instantiated from an integer One (1).
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_with_int_one()
    {
        $booleanValueObject = new BooleanValueObject(1);
    }


    /**
     * It throws exception when instantiated from an integer Zero (0).
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_with_int_zero()
    {
        $booleanValueObject = new BooleanValueObject(0);
    }


    /**
     * It throws exception when instantiated from a float type.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_with_a_float()
    {
        $booleanValueObject = new BooleanValueObject(1.99999);
    }


    /**
     * It throws exception when instantiated from an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_with_an_object()
    {
        $booleanValueObject = new BooleanValueObject((object)[]);
    }


    /**
     * It throws exception when instantiated from null.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotBoolean
     */
    public function it_throws_exception_when_instantiated_with_null()
    {
        $booleanValueObject = new BooleanValueObject(null);
    }


    /**
     * It can get the correct set value.
     *
     * @test
     */
    public function it_can_get_the_correct_value()
    {
        $booleanValueObject = new BooleanValueObject(true);
        $this->assertTrue($booleanValueObject->getValue());
    }


    /**
     * It knows it is the same value when comparing another object of the
     * same value.
     *
     * @test
     */
    public function it_knows_when_comparing_an_object_of_the_same_value()
    {
        $original = new BooleanValueObject(true);
        $compare = new BooleanValueObject(true);

        $this->assertTrue(
            $original->sameValueAs($compare)
        );

        $this->assertTrue(
            $compare->sameValueAs($original)
        );
    }


    /**
     * It knows it is not the same value when comparing
     * an object of a different value.
     *
     * @test
     */
    public function it_knows_when_comparing_an_object_of_a_different_value()
    {
        $original = new BooleanValueObject(true);
        $compare = new BooleanValueObject(false);
        
        $this->assertFalse(
            $original->sameValueAs($compare)
        );

        $this->assertFalse(
            $compare->sameValueAs($original)
        );
    }
}
