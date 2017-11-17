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

namespace Eventful\Test\Unit\Example\Model\ToDo;

use Eventful\Example\Model\ToDo\Description;
use Eventful\Example\Model\ToDo\Exception\InvalidToDoDescription;
use Eventful\Test\TestCase;


/**
 * Tests for the to do description.
 */
class DescriptionTest extends TestCase
{


    /**
     * Tests that the description cannot be an
     * empty string or containing only spaces
     *
     * @test
     * @expectedException \Eventful\Example\Model\ToDo\Exception\InvalidToDoDescription
     */
    public function it_must_have_at_least_one_alpha_numeric_character()
    {
        $invalidDescription = new Description(' ');
    }
}

