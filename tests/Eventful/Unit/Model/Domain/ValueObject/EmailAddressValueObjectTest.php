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
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\Exception\InvalidEmailAddress;
use Eventful\Domain\ValueObject\EmailAddressValueObject;

/**
 * Tests for the email address value object.
 */
class EmailAddressValueObjectTest extends TestCase
{


    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_is_value_object()
    {
        $emailValueObject = new EmailAddressValueObject(
            'mifsud.k@gmail.com'
        );
        $this->assertInstanceOf(
            ValueObject::class,
            $emailValueObject
        );
    }


    /**
     * Tests that it can get the email value.
     *
     * @test
     */
    public function it_can_get_the_email()
    {
        $emailValueObject = new EmailAddressValueObject(
            'mifsud.k@gmail.com'
        );
        $this->assertEquals(
            'mifsud.k@gmail.com',
            $emailValueObject->getValue()
        );
    }


    /**
     * Tests that it throws an exception when the email address
     * is not valid.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\InvalidEmailAddress
     */
    public function it_throws_exception_when_instantiated_from_an_invalid_email(
    )
    {
        $emailValueObject = new EmailAddressValueObject(
            'not@vali.co_m'
        );
    }


    /**
     * Tests that it can compare same and different email addresses.
     *
     * @test
     */
    public function it_can_compare_two_email_addresses()
    {
        $originalEmailAddress = new EmailAddressValueObject(
            'mifsud.k@gmail.com'
        );

        $sameEmailAddress = new EmailAddressValueObject(
            'mifsud.k@gmail.com'
        );

        $differentEmailAddress = new EmailAddressValueObject(
            'differeent@gmail.com'
        );

        $this->assertTrue(
            $originalEmailAddress->sameValueAs($sameEmailAddress)
        );
        $this->assertTrue(
            $sameEmailAddress->sameValueAs($originalEmailAddress)
        );

        $this->assertFalse(
            $originalEmailAddress->sameValueAs($differentEmailAddress)
        );
        $this->assertFalse(
            $differentEmailAddress->sameValueAs($originalEmailAddress)
        );
    }
}

