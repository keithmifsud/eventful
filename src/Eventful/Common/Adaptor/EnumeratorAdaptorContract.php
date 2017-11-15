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


/**
 * The contract for an enumerator adaptor.
 */
interface EnumeratorAdaptorContract
{

    /**
     * Gets the value.
     *
     * @return mixed
     */
    public function getValue();


    /**
     * Gets the value as a string.
     *
     * @return string
     */
    public function toString() : string ;


    /**
     * Gets the value statically.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments);
}