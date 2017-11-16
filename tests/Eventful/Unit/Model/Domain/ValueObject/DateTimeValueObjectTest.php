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

use Eventful\Domain\Exception\InvalidDate;
use Eventful\Test\TestCase;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\ValueObject\DateTimeValueObject;

/**
 * Tests for date time value object.
 */
class DateTimeValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $dateTimeValueObject = DateTimeValueObject::fromNativeDateTime(
            new \DateTimeImmutable()
        );
        $this->assertInstanceOf(
            ValueObject::class,
            $dateTimeValueObject
        );
    }


    /**
     * Tests that it can be instantiated from a native date time object.
     *
     * @test
     */
    public function it_can_be_instantiated_from_a_native_date_time_object()
    {
        $dateTimeValueObject = DateTimeValueObject::fromNativeDateTime(
            new \DateTime()
        );
        $this->assertInstanceOf(
            DateTimeValueObject::class,
            $dateTimeValueObject
        );
    }


    /**
     * Tests that it can get this time and this date.
     *
     * Give or take milliseconds to process the test.
     *
     * @test
     */
    public function it_can_get_the_correct_now_time()
    {
        $now = \DateTimeImmutable::createFromMutable(
            new \DateTime()
        );

        $dateTimeValueObject = DateTimeValueObject::getTheCurrentDateAndTime();

        $interval = $now->diff($dateTimeValueObject)->s;

        $this->assertEquals(
            0,
            $interval
        );
    }


    /**
     * It ca be initiated from a unix time string.
     *
     * @test
     */
    public function it_can_be_instantiated_from_a_valid_unix_time_string()
    {
        $dateTimeValueObject = DateTimeValueObject::fromString(
            '2017-11-16 00:00:00'
        );

        $this->assertInstanceOf(
            DateTimeValueObject::class,
            $dateTimeValueObject
        );
        $this->assertEquals(
            '2017-11-16 00:00:00',
            $dateTimeValueObject->toString()
        );
    }


    /**
     * Tests that an exception is thrown when initiated form an invalid string.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\InvalidDate
     */
    public function it_throws_exception_when_instantiated_from_an_invalid_string(
    )
    {

        $dateTimeValueObject = DateTimeValueObject::fromString('not_valid');
    }


    /**
     * Tests that an exception is thrown when passing an invalid format.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\InvalidDate
     */
    public function it_throws_exception_when_given_a_wrong_format()
    {
        $date = new \DateTimeImmutable();
        $invalidStringDateTimeValueObject = DateTimeValueObject::fromString(
            $date->format('Y-m-d H:i:s'),
            'D-m-y H:i:s'
        );
    }

}
