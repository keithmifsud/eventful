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

use Eventful\Domain\Exception\NotDouble;

/**
 * An extensible double floating point value object.
 */
class DoubleValueObject extends BaseValueObject implements ValueObject
{


    /**
     * DoubleValueObject constructor.
     *
     * @param double $double
     * @throws NotDouble
     */
    public function __construct($double)
    {
        if (!$this->isValidDouble($double)) {
            throw new NotDouble();
        }

        $this->setValue($double);
    }


    /**
     * Gets the value as a double floating point number.
     *
     * @return double
     */
    public function toDouble(): float
    {
        return (double)$this->getValue();
    }


    /**
     * Checks if the given value is a value double floating
     * point number.
     *
     * @param mixed $value
     * @return bool
     */
    private function isValidDouble($value): bool
    {
        if ((is_double($value)) &&
            (!preg_match(
                '/\.[0-9]{2,}[1-9][0-9]*$/',
                    (string)$value) > 0
            )
        ) {
            return true;
        }
        return false;
    }
}
