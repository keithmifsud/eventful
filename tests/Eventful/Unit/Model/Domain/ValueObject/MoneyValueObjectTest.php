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
use Eventful\Domain\ValueObject\FloatValueObject;
use Eventful\Domain\ValueObject\MoneyValueObject;
use Eventful\Domain\ValueObject\IntegerValueObject;
use Eventful\Domain\ValueObject\CurrencyCodeValueObject;

/**
 * Tests for the money value object.
 *
 */
class MoneyValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface.
     *
     * @test
     */
    public function it_is_a_value_object()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(100000)
        );
        $this->assertInstanceOf(
            ValueObject::class,
            $moneyValueObject
        );
    }


    /**
     * Tests that it can get the currency as a string
     *
     * @test
     */
    public function it_can_get_the_currency_string()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(100000)
        );
        $this->assertEquals(
            'USD',
            $moneyValueObject->getCurrency()
        );
    }


    /**
     * Tests that it can get the amount value.
     *
     * @test
     */
    public function it_can_get_the_amount_value()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(100000)
        );
        $this->assertEquals(
            100000,
            $moneyValueObject->getAmount()
        );
    }


    /**
     * Tests that it can get the amount to double floating
     * number.
     *
     * @test
     */
    public function it_can_get_the_amount_as_double()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(10000)
        );
        $this->assertEquals(
            100.00,
            $moneyValueObject->getAmountAsDouble()
        );
    }


    /**
     * Tests that getting the value returns the amount
     * as integer.
     *
     * @test
     */
    public function it_gets_the_integer_amount_when_asking_for_value()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(10000)
        );
        $this->assertEquals(
            10000,
            $moneyValueObject->getValue()
        );
        $this->assertTrue(is_int($moneyValueObject->getValue()));
    }


    /**
     * Tests that it gets a string representation of the money.
     *
     * @test
     */
    public function it_gets_a_string_representation_of_the_money()
    {
        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(10000)
        );
        $this->assertEquals(
            'EUR 100.00',
            $moneyValueObject->toString()
        );

        $moneyValueObject = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(123456)
        );
        $this->assertEquals(
            'USD 1234.56',
            $moneyValueObject->toString()
        );
    }


    /**
     * Tests that it knows if the compared money
     * has the same currency or not.
     *
     * @test
     */
    public function it_can_compare_the_currency()
    {
        $originalMoney = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(1234567890)
        );

        $sameCurrency = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(1234567890)
        );

        $differentCurrency = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(1234567890)
        );

        $this->assertTrue(
            $originalMoney->sameCurrencyAs($sameCurrency)
        );
        $this->assertTrue(
            $sameCurrency->sameCurrencyAs($originalMoney)
        );

        $this->assertFalse(
            $originalMoney->sameCurrencyAs($differentCurrency)
        );
        $this->assertFalse(
            $differentCurrency->sameCurrencyAs($originalMoney)
        );
    }


    /**
     * Tests that it knows if the compared money
     * has the same amount or not.
     *
     * @test
     */
    public function it_can_compare_the_amount()
    {
        $originalMoney = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(1234567890)
        );

        $sameAmount = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(1234567890)
        );

        $differentAmount = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(87654321)
        );

        $this->assertTrue(
            $originalMoney->sameAmountAs($sameAmount)
        );
        $this->assertTrue(
            $sameAmount->sameAmountAs($originalMoney)
        );

        $this->assertFalse(
            $originalMoney->sameAmountAs($differentAmount)
        );
        $this->assertFalse(
            $differentAmount->sameAmountAs($originalMoney)
        );
    }


    /**
     * Tests that it can compare money values.
     *
     * @test
     */
    public function it_can_compare_the_value_of_money()
    {
        $original = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(4554)
        );

        $sameAmountAndCurrency = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(4554)
        );

        $sameAmountDifferentCurrency = new MoneyValueObject(
            new CurrencyCodeValueObject('USD'),
            new IntegerValueObject(4554)
        );

        $differentAmountSameCurrency = new MoneyValueObject(
            new CurrencyCodeValueObject('EUR'),
            new IntegerValueObject(6789)
        );

        $this->assertTrue(
            $original->sameValueAs($sameAmountAndCurrency)
        );
        $this->assertTrue(
            $sameAmountAndCurrency->sameValueAs($original)
        );

        $this->assertFalse(
            $original->sameValueAs($differentAmountSameCurrency)
        );
        $this->assertFalse(
            $differentAmountSameCurrency->sameValueAs($original)
        );

        $this->assertFalse(
            $original->sameValueAs($sameAmountDifferentCurrency)
        );
        $this->assertFalse(
            $sameAmountDifferentCurrency->sameValueAs($original)
        );
    }
}
