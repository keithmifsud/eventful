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


namespace Eventful\Common\Adaptor;

use Eventful\Common\Adaptor\UniqueIdentifier;
use Eventful\Domain\ValueObject\IdentifierValueObject;

/**
 * A contract for a unique identifier.
 */
interface UniqueIdentifierAdaptorContract
{

    /**
     * Generates a new unique identifier.
     *
     * @return mixed
     */
    public static function generate() : UniqueIdentifier;


    /**
     * Gets the identifier from string.
     *
     * @param string $identifier
     * @return mixed
     */
    public static function fromString(string $identifier);


    /**
     * Gets the identifier's string.
     *
     * @return string
     */
    public function toString() : string ;


    /**
     * Gets the identifier.
     *
     * @return UniqueIdentifier
     */
    public function getIdentifier() : UniqueIdentifier ;
}