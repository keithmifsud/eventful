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
 * Contract for value objects.
 *
 */
interface ValueObject
{


    /**
     * Gets the value of the object.
     *
     * @return mixed
     */
    public function getValue();



    /**
     * Determines the equality of both value objects.
     *
     * @param ValueObject $other
     * @return bool
     */
    public function sameValueAs(ValueObject $other) : bool ;
}