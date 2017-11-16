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

use Eventful\Domain\Exception\NotInteger;

/**
 * An extensible integer value object.
 */
class IntegerValueObject extends BaseValueObject implements ValueObject
{


    /**
     * IntegerValueObject constructor.
     *
     * @param int $integer
     * @throws NotInteger
     */
    public function __construct($integer)
    {
        if (! $this->isValidInteger($integer)) {
            throw new NotInteger();
        }
        $this->setValue($integer);
    }


    /**
     * Gets the integer value.
     *
     * @return int
     */
    public function toInteger() : int
    {
        return (int) $this->value;
    }


    /**
     * Checks if the value is an integer.
     *
     * @param mixed $value
     * @return bool
     */
    private function isValidInteger($value) : bool
    {
        return is_int($value);
    }
}