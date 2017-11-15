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

use Eventful\Common\Adaptor\UniqueIdentifier;
use Eventful\Domain\Exception\InvalidArgument;


/**
 * An extensible identifier value object.
 */
class IdentifierValueObject extends BaseValueObject implements ValueObject
{


    /**
     * Generates a new identifier.
     *
     * @return IdentifierValueObject
     */
    public static function generate(): IdentifierValueObject
    {
        $identifier = UniqueIdentifier::generate();
        return new self($identifier);
    }


    /**
     * Generates an identifier from string.
     *
     * @param string $identifier
     * @return IdentifierValueObject
     * @throws InvalidArgument
     */
    public static function fromString(
        string $identifier
    ): IdentifierValueObject {

        try {
            $identifierObject = UniqueIdentifier::fromString($identifier);
        } catch (\Exception $exception) {
            throw new InvalidArgument($exception->getMessage());
        }
        return new self(
            $identifierObject
        );
    }


    /**
     * Gets the identifier's string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->value->toString();
    }


    /**
     * IdentifierValueObject constructor.
     *
     * @param $identifierValueObject
     */
    protected function __construct($identifierValueObject)
    {
        $this->setValue($identifierValueObject);
    }
}