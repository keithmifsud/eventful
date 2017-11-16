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

use Eventful\Domain\Exception\NotBoolean;

/**
 * An extensible boolean value object.
 */
class BooleanValueObject extends BaseValueObject implements ValueObject
{


    /**
     * BooleanValueObject constructor.
     *
     * @param boolean $boolean
     * @throws NotBoolean
     */
    public function __construct($boolean)
    {
        if (!$this->isBooleanLiteral($boolean)) {
            throw new NotBoolean();
        }
        $this->setValue($boolean);
    }


    /**
     * Checks if the value is literally boolean.
     *
     * @param mixed $boolean
     * @return bool
     */
    private function isBooleanLiteral($boolean): bool
    {
        if (false === $boolean) {
            return true;
        }
        switch ($boolean) {
            case is_string($boolean) :
                return false;
            case $boolean === true :
                return true;
            case $boolean === 1 :
                return false;
            case $boolean === 0 :
                return false;
        }
        return false;
    }


}