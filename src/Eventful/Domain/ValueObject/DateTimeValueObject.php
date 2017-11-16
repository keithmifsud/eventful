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

use Eventful\Domain\Exception\InvalidDate;

/**
 * Class DateTimeValueObject
 */
class DateTimeValueObject extends BaseValueObject implements ValueObject
{


    /**
     * Builds the object form a native date format and returns
     * the value.
     *
     * @param \DateTime|\DateTimeImmutable $dateTime
     * @return static
     */
    public static function fromNativeDateTime($dateTime): self
    {
        if (is_a($dateTime, \DateTime::class)) {
            $dateTime = \DateTimeImmutable::createFromMutable($dateTime);
        }
        $dateTime = new static($dateTime);
        return $dateTime;
    }


    /**
     * Gets the current date and time.
     *
     * @return \DateTimeImmutable
     */
    public static function getTheCurrentDateAndTime(): \DateTimeImmutable
    {
        $immutableNow = \DateTimeImmutable::createFromMutable(
            new \DateTime()
        );
        $dateTime = new self($immutableNow);
        return $dateTime->getValue();
    }


    /**
     * Gets the date time object from a string representation.
     *
     * @param string $dateTimeString
     * @param string $format
     * @return self
     */
    public static function fromString(
        string $dateTimeString,
        $format = 'Y-m-d H:i:s'
    ): self {

        $dateFromStringFormat = \DateTimeImmutable::createFromFormat(
            $format,
            $dateTimeString
        );
        $valueObject = new self($dateFromStringFormat);
        return $valueObject;
    }


    /**
     * Gets a string representation of the object.
     *
     * @param string $format
     * @return string
     */
    public function toString(string $format = 'Y-m-d H:i:s'): string
    {
        return $this->getValue()->format($format);
    }


    /**
     * DateTimeValueObject constructor.
     *
     * @param $validDate
     * @throws InvalidDate
     */
    protected function __construct($validDate)
    {
        if (!$this->isValidDate($validDate)) {
            throw new InvalidDate();
        }
        $this->setValue($validDate);
    }


    /**
     * Checks if it is a valid date object.
     * Must be immutable.
     *
     * @param mixed $value
     * @return bool
     */
    private function isValidDate($value)
    {
        if (is_a($value, \DateTimeImmutable::class)) {
            return true;
        }
        return false;
    }

}
