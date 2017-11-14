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
 * An extensible identifier value object.
 */
class IdentifierValueObject extends BaseValueObject implements ValueObject
{

    /**
     * @var IdentifierValueObject
     */
    protected $value;


    /**
     * IdentifierValueObject constructor.
     *
     * @param IdentifierValueObject $identifierValueObject
     */
    protected function __construct(IdentifierValueObject $identifierValueObject)
    {
        $this->setValue($identifierValueObject);
    }


    /**
     * Sets the Value.
     *
     * @param IdentifierValueObject $value
     */
    protected function setValue(IdentifierValueObject $value)
    {
        $this->value = $value;
    }

}