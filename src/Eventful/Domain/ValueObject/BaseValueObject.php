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
 * A base value object to be extended by other implementations.
 *
 */
abstract class BaseValueObject
{

    /**
     * @var ValueObject
     */
    protected $value;



    /**
     * Gets the value of the object.
     *
     * @return ValueObject
     */
    public function getValue() : ValueObject
    {
        return $this->value;
    }


    /**
     * Determines if the objects are of the same value.
     *
     * @param ValueObject $other
     * @return bool
     */
    public function sameValueAs(ValueObject $other) : bool
    {
        return $this->getValue() === $other->getValue();
    }


    /**
     * Sets the Value.
     *
     * @param ValueObject $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

}