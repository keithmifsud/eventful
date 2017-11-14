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

use Eventful\Domain\Adaptor\UniqueIdentifier;
use Eventful\Domain\Exception\InvalidArgument;
use Eventful\Domain\ValueObject\IdentifierValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;


/**
 * Tests for the identifier value object.
 */
class IdentifierValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $identifier = IdentifierValueObject::generate();
        $this->assertInstanceOf(ValueObject::class, $identifier);
    }


    /**
     * Tests that it can generate a new identifier.
     *
     * @test
     */
    public function it_can_generate_an_identifier()
    {
        $identifier = IdentifierValueObject::generate();
        $this->assertInstanceOf(
            IdentifierValueObject::class,
            $identifier
        );
    }


    /**
     * Tests that it can generate an identifier from string.
     *
     * @test
     */
    public function it_can_generate_identifier_from_string()
    {
        $string = 'b514af82-3c4f-4bb5-b1da-a89a0ced5e6f';
        $identifier = IdentifierValueObject::fromString($string);
        $this->assertInstanceOf(
            IdentifierValueObject::class,
            $identifier
        );
    }


    /**
     * Tests that an exception is thrown when passing an invalid string.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\InvalidArgument
     */
    public function it_throws_an_exception_when_generated_from_invalid_string()
    {
        $invalidString = 'random';
        $identifier = IdentifierValueObject::fromString($invalidString);
    }


    /**
     * Tests that it can get the identifier's string.
     *
     * @test
     */
    public function it_can_get_the_identifier_string()
    {
        $identifier = IdentifierValueObject::generate();
        $this->assertTrue(
            is_string($identifier->toString())
        );
    }


    /**
     * Tests that it knows when comparing a different identifier.
     *
     * @test
     */
    public function it_knows_when_a_compared_identifier_has_a_different_value()
    {
        $original = IdentifierValueObject::generate();
        $compare = IdentifierValueObject::generate();

        $this->assertFalse(
            $original->sameValueAs($compare)
        );
    }


    /**
     * Tests that it knows when comparing an identifier of the same value.
     *
     * @test
     */
    public function it_knows_when_another_identifier_has_the_same_value()
    {
        $original = IdentifierValueObject::generate();
        $compare = IdentifierValueObject::fromString(
            $original->toString()
        );

        $this->assertTrue(
            $original->sameValueAs($compare)
        );
    }
}
