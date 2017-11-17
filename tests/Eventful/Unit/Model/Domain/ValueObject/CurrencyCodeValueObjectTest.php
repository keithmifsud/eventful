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
use Eventful\Domain\Exception\InvalidCurrencyCode;
use Eventful\Common\Exception\UndefinedEnumeratorValue;
use Eventful\Domain\ValueObject\CurrencyCodeValueObject;


/**
 * Tests for the currency code value object.
 */
class CurrencyCodeValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $currencyCodeValueObject = new CurrencyCodeValueObject('EUR');
        $this->assertInstanceOf(
            ValueObject::class,
            $currencyCodeValueObject
        );
    }


    /**
     * Tests that it can be instantiated from a valid currency code.
     *
     * @test
     */
    public function it_can_be_instantiated_from_a_valid_currency_code()
    {
        $currencyCodeValueObject = new CurrencyCodeValueObject('EUR');
        $this->assertInstanceOf(
            CurrencyCodeValueObject::class,
            $currencyCodeValueObject
        );
    }


    /**
     * Tests that an exception is throws when instantiated from an invalid
     * currency code.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\InvalidCurrencyCode
     */
    public function it_throws_exception_when_instantiated_from_an_invalid_code()
    {
        $invalidCode = new CurrencyCodeValueObject('INV');
    }


    /**
     * Tests that it can get the correct value of the code.
     *
     * @test
     */
    public function it_can_get_the_correct_value()
    {
        $currencyCodeValueObject = new CurrencyCodeValueObject('USD');
        $this->assertEquals(
            'USD',
            $currencyCodeValueObject->getValue()
        );
    }


    /**
     * Tests that it knows another object is of the same value when compared.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_of_the_value()
    {
        $original = new CurrencyCodeValueObject('NPR');
        $sameValue = new CurrencyCodeValueObject('NPR');

        $this->assertTrue($original->sameValueAs($sameValue));
        $this->assertTrue($sameValue->sameValueAs($original));
    }


    /**
     * Tests that it knows another object has a different value
     * when compared.
     *
     * @test
     */
    public function it_knows_when_compared_to_an_object_if_different_value()
    {
        $original = new CurrencyCodeValueObject('AED');
        $differentValue = new CurrencyCodeValueObject('YER');

        $this->assertFalse($original->sameValueAs($differentValue));
        $this->assertFalse($differentValue->sameValueAs($original));
    }
}

