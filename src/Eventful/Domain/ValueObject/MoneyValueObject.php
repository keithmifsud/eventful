<?php declare(strict_types=1);

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


namespace Eventful\Domain\ValueObject;


/**
 * An extensible money value object.
 *
 */
class MoneyValueObject extends BaseValueObject implements ValueObject
{

    /**
     * @var CurrencyCodeValueObject
     */
    protected $currency;


    /**
     * @var IntegerValueObject
     */
    protected $amount;


    /**
     * MoneyValueObject constructor.
     *
     * @param CurrencyCodeValueObject $currency
     * @param IntegerValueObject      $amount
     */
    public function __construct(
        CurrencyCodeValueObject $currency,
        IntegerValueObject $amount
    ) {
        $this->setCurrency($currency);
        $this->setAmount($amount);
        $this->setValue($this->getAmount());
    }


    /**
     * Gets the currency.
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency->toString();
    }


    /**
     * Gets the amount.
     *
     * @return integer
     */
    public function getAmount(): int
    {
        return $this->amount->toInteger();
    }


    /**
     * Gets the amount as a double.
     *
     * @return double
     */
    public function getAmountAsDouble(): float
    {
        $centsOfHundred = ($this->getAmount() / 100);
        return round($centsOfHundred, 2);
    }


    /**
     * Gets a string representation of the money.
     * Starting with the currency code and the amount
     * as double.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->getCurrency() .
            ' ' .
            money_format('%.2n', $this->getAmountAsDouble());
    }


    /**
     * Checks of both money have the same currency or not.
     *
     * @param MoneyValueObject $otherMoney
     * @return bool
     */
    public function sameCurrencyAs(MoneyValueObject $otherMoney): bool
    {
        return $this->currency->sameValueAs($otherMoney->currency);
    }


    /**
     * Checks if both have the same amount or not.
     *
     * @param MoneyValueObject $otherMoney
     * @return bool
     */
    public function sameAmountAs(MoneyValueObject $otherMoney): bool
    {
        return $this->amount->sameValueAs($otherMoney->amount);
    }


    /**
     * Determines if the other money has the same
     * value as this one.
     *
     * @param ValueObject $otherMoney
     * @return bool
     */
    public function sameValueAs(ValueObject $otherMoney): bool
    {
        return $this->currency->sameValueAs($otherMoney->currency) &&
            $this->amount->sameValueAs($otherMoney->amount);
    }


    /**
     * Sets the Currency.
     *
     * @param CurrencyCodeValueObject $currency
     */
    protected function setCurrency(CurrencyCodeValueObject $currency): void
    {
        $this->currency = $currency;
    }


    /**
     * Sets the amount.
     *
     * @param IntegerValueObject $amount
     */
    protected function setAmount(IntegerValueObject $amount): void
    {
        $this->amount = $amount;
    }
}
