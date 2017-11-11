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

namespace Eventful\Test\Unit\Example\ToDo\Command;

use Eventful\Example\ToDo\Command\PostTodo;
use Eventful\Test\TestCase;


/**
 * Unit test for the PostToDo command.
 */
class PostTodoTest extends TestCase
{

    /**
     * Tests that it can get the description.
     *
     * @test
     */
    public function itCanGetTheDescription()
    {
        $description = 'This needs doing.';
        $command = new PostTodo($description);
        $this->assertEquals($description, $command->getDescription());
    }
}
