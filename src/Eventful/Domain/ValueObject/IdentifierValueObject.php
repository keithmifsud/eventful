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
 * A contract for an unique identifier.
 *
 */
interface IdentifierValueObject
{

    /**
     * Generates a new unique identifier.
     *
     * @return IdentifierValueObject
     */
    public function generate() : IdentifierValueObject ;


    /**
     * Gets an unique identifier from string.
     *
     * @param string $identifier
     * @return IdentifierValueObject
     */
    public static function fromString(string $identifier) : IdentifierValueObject ;


    /**
     * Gets the unique identifier's string.
     *
     * @return string
     */
    public function toString() : string ;
}