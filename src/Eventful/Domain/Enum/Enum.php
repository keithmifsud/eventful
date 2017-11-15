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


namespace Eventful\Domain\Enum;

use Eventful\Domain\Exception\NotScalarOrNull;

/**
 * An extensible enumerator type.
 *
 */
abstract class Enum
{

    /**
     * The enum value.
     *
     * @var null|bool|int|float|string
     */
    private $value;


    /**
     * The position of the enumerator.
     *
     * @var null|int
     */
    private $position;


    /**
     * Array of enum names and values for enumerator objects.
     *
     * @var array
     */
    private static $constants = [];


    /**
     * An array of enum labels for enumerator objects.
     *
     * @var array
     */
    private static $labels = [];


    /**
     * Instantiated enumerator objects.
     *
     * @var array
     */
    private static $enumInstances = [];


    public function toString()
    {
        
    }


    private function __construct($value, int $position = null)
    {
        $this->setValue($value);
        $this->setPosition($position);
    }


    /**
     * Exception is thrown if value is not valid.
     *
     * @param $value
     * @return mixed
     * @throws NotScalarOrNull
     */
    private function valueMustBeValid($value)
    {
        if (!$this->isValidType($this->value)) {
            throw new NotScalarOrNull(
                "Enumerator value must be either null or of a scalar type."
            );
        }
        return $value;
    }


    /**
     * Checks if the value is of a valid type.
     *
     * @param null|int|float|bool|string $evaluate
     * @return bool
     */
    private function isValidType($evaluate): bool
    {
        return is_scalar($evaluate) || is_null($evaluate);
    }


    /**
     * Sets the value.
     *
     * @param $value
     */
    private function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * Sets the position.
     *
     * @param int|null $position
     */
    private function setPosition(int $position = null)
    {
        $this->position = $position;
    }


}