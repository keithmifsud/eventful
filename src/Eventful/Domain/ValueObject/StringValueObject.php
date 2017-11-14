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

use Eventful\Domain\Exception\InvalidString;


/**
 * An extensible string value object.
 */
class StringValueObject extends BaseValueObject implements ValueObject
{

    /**
     * StringValueObject constructor.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->setValue((string) $string);
    }


    public function toString() : string
    {
        return (string) $this->getValue();
    }
}