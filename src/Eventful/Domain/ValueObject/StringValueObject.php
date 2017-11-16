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

use Eventful\Domain\Exception\NotString;


/**
 * An extensible string value object.
 */
class StringValueObject extends BaseValueObject implements ValueObject
{

    /**
     * StringValueObject constructor.
     *
     * @param string $string
     * @throws NotString
     */
    public function __construct($string)
    {
        if (! $this->isValidString($string)) {
            throw new NotString();
        }
        $this->setValue((string) $string);
    }


    /**
     * Gets the string value.
     *
     * @return string
     */
    public function toString() : string
    {
        return (string) $this->getValue();
    }


    /**
     * Checks if the argument is a valid string.
     *
     * @param mixed $string
     * @return bool
     */
    private function isValidString($string) : bool
    {
        if (! is_string($string)) {
            return false;
        }

        return true;
    }
}