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

namespace Eventful\Test\Unit\Model\Domain\Enum;


use Eventful\Domain\Exception\NotScalarOrNull;
use Eventful\Test\TestCase;


/**
 * Tests for enum.
 */
class EnumTest extends TestCase
{


    /**
     * Tests that it throws an exception when the value is an object.
     *
     * @test
     * @expectedException \Eventful\Domain\Exception\NotScalarOrNull
     */
    public function it_throws_exception_when_value_type_is_object()
    {
        $objectValue = (object) [];
       // $this->assertSame()
    }
}
