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

use Eventful\Common\Exception\UndefinedEnumeratorValue;
use MyCLabs\Enum\Enum;

/**
 * An adaptor for a third party enumerator.
 *
 */
abstract class Enumerator extends Enum implements EnumeratorAdaptorContract
{

    /**
     * Enumerator constructor.
     *
     * @param mixed $value
     * @throws UndefinedEnumeratorValue
     */
    public function __construct($value)
    {
        try {
            parent::__construct($value);
        } catch (\Exception $exception) {
            throw new UndefinedEnumeratorValue(
                $value . ' is not a valid value for this enumerator.'
            );
        }

    }


    /**
     * Gets the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        $value = parent::getValue();
        return $value;
    }


    /**
     * Gets the value as a string.
     *
     * @return string
     */
    public function toString() : string
    {
        return parent::__toString();
    }


    /**
     * Gets the value statically.
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return parent::__callStatic($name, $arguments);
    }

}