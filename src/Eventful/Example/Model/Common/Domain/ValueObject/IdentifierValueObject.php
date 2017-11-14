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


namespace Eventful\Example\Model\Common\Domain\ValueObject;


use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Domain\Adaptor\UniqueIdentifier;
use Eventful\Domain\ValueObject\BaseValueObject;


/**
 * An extensible identifier value object.
 */
class IdentifierValueObject extends BaseValueObject implements ValueObject
{


    public static function generate()
    {
        $identifier = UniqueIdentifier::generate();
        return new self($identifier);
    }
}