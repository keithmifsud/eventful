<?php
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

namespace Eventful\Test\Unit\Model\Domain\ValueObject;

use Eventful\Domain\ValueObject\CurrencyCodeValueObject;
use Eventful\Domain\ValueObject\ValueObject;
use Eventful\Test\TestCase;

/**
 * Tests for the currency code value object.
 */
class CurrencyCodeValueObjectTest extends TestCase
{

    /**
     * Tests that it implements the value object interface
     *
     * @test
     */
    public function it_implements_the_value_object_contract()
    {
        $currencyCodeValueObject = new CurrencyCodeValueObject('EUR');
        $this->assertInstanceOf(
            ValueObject::class,
            $currencyCodeValueObject
        );
    }
}

