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

use Eventful\Domain\Exception\NotFloat;

/**
 * An extensible float value object.
 */
class FloatValueObject extends BaseValueObject implements ValueObject
{


    /**
     * FloatValueObject constructor.
     *
     * @param float $float
     * @throws NotFloat
     */
    public function __construct($float)
    {
        if (! $this->isValidFloat($float)) {
            throw new NotFloat();
        }
        $this->setValue($float);
    }


    /**
     * Gets the value as a floating number.
     *
     * @return float
     */
    public function toFloat() :float
    {
        return (float) $this->getValue();
    }


    /**
     * Checks if the value is a valid float.
     *
     * @param mixed $value
     * @return bool
     */
    private function isValidFloat($value) : bool
    {
        return is_float($value);
    }
}
