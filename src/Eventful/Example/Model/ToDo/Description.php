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


namespace Eventful\Example\Model\ToDo;


use Eventful\Domain\Exception\NotString;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\ValueObject\StringValueObject;
use Eventful\Example\Model\ToDo\Exception\InvalidToDoDescription;

/**
 * The to do's description.
 */
final class Description extends StringValueObject implements ValueObject
{


    /**
     * Description constructor.
     *
     * @param string $description
     * @throws InvalidToDoDescription
     * @throws NotString
     */
    public function __construct($description)
    {
        if (!$this->isValid($description)) {
            throw new InvalidToDoDescription();
        }
        parent::__construct($description);
    }


    /**
     * Checks if the description is valid.
     *
     * @param string $description
     * @return bool
     */
    private function isValid(string $description): bool
    {
        return (!ctype_space($description) || $description == '');
    }
}
