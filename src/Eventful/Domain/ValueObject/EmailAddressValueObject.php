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

use Eventful\Domain\Exception\NotString;
use Eventful\Domain\Exception\InvalidEmailAddress;

/**
 * An extensible email address value object.
 */
class EmailAddressValueObject extends StringValueObject implements ValueObject
{


    /**
     * EmailAddressValueObject constructor.
     *
     * @param string $emailAddress
     * @throws InvalidEmailAddress
     * @throws NotString
     */
    public function __construct(string $emailAddress)
    {
        if (!$this->isValidEmailAddress($emailAddress)) {
            throw new InvalidEmailAddress();
        }
        parent::__construct($emailAddress);
    }


    /**
     * Checks if the email address is valid.
     *
     * @param string $value
     * @return bool
     */
    private function isValidEmailAddress(string $value): bool
    {
        $filtered = filter_var($value, FILTER_VALIDATE_EMAIL);
        return true == $filtered;
    }
}
