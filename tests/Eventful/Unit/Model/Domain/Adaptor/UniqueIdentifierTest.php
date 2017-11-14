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


use Eventful\Test\TestCase;
use Eventful\Domain\Adaptor\UniqueIdentifier;
use Eventful\Domain\Adaptor\UniqueIdentifierAdaptorContract;


/**
 * Tests for the unique identifier adaptor.
 */
class UniqueIdentifierTest extends TestCase
{


    /**
     * Tests that the adaptor implements the contract.
     *
     * @test
     */
    public function it_implements_the_adaptor_interface()
    {
        $adaptor = UniqueIdentifier::generate();
        $this->assertInstanceOf(UniqueIdentifierAdaptorContract::class,
            $adaptor);
    }


    /**
     * Tests that it can generate a new unique identifier.
     *
     * @test
     */
    public function it_generates_a_new_identifier()
    {
        $identifier = UniqueIdentifier::generate();
        $this->assertInstanceOf(UniqueIdentifier::class, $identifier);
    }


    /**
     * Tests that it can generate an identifier from it's string and
     * that it is the same object.
     *
     * @test
     */
    public function it_can_get_an_identifier_from_string()
    {
        $identifier = UniqueIdentifier::generate();
        $fromString = UniqueIdentifier::fromString($identifier->toString());
        $this->assertEquals($identifier, $fromString);
    }


    /**
     * Test that it can get the string of the identifier.
     *
     * @test
     */
    public function it_can_get_the_string()
    {
        $this->assertTrue(
            is_string(UniqueIdentifier::generate()->toString())
        );

    }
}
