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


namespace Eventful\Domain\Adaptor;

use Eventful\Domain\ValueObject\IdentifierValueObject;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * The unique identifier generator's adaptor.
 *
 */
final class UniqueIdentifier implements
    UniqueIdentifierAdaptorContract
{


    /**
     * @var UniqueIdentifier
     */
    protected $identifier;


    /**
     * Generates a new unique identifier.
     *
     * @return UniqueIdentifier
     */
    public static function generate() : UniqueIdentifier
    {
        $identifier = new self(Uuid::uuid4());
        return $identifier;
    }


    /**
     * Gets the identifier from string.
     *
     * @param string $identifier
     * @return UniqueIdentifier
     */
    public static function fromString(string $identifier) : UniqueIdentifier
    {
        $identifierClass = new self(Uuid::fromString($identifier));
        return $identifierClass;
    }


    /**
     * Gets the identifier's string.
     *
     * @return string
     */
    public function toString() : string
    {
        return $this->identifier->toString();
    }


    /**
     * Gets the Identifier.
     *
     * @return UniqueIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }


    /**
     * IdentifierValueObject constructor.
     *
     * @param UuidInterface $identifier
     */
    protected function __construct(UuidInterface $identifier)
    {
        $this->setIdentifier($this->identifier);
    }



    /**
     * Sets the Identifier.
     *
     * @param UniqueIdentifier $identifier
     */
    protected function setIdentifier(UniqueIdentifier $identifier)
    {
        $this->identifier = $identifier;
    }

}