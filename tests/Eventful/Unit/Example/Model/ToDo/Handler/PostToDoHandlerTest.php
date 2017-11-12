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

namespace Eventful\Test\Unit\Example\Model\ToDo\Handler;

use Eventful\Example\Model\ToDo\Command\PostTodo;
use Eventful\Example\Model\ToDo\Handler\PostToDoCommandHandler;
use Eventful\Test\TestCase;

/**
 * Example test for the post to do command handler.
 */
class PostToDoHandlerTest extends TestCase
{


    public function it_can_post_todo()
    {
        $description = 'This needs doing.';

        // when post todo command is called

        // command is handled

        // new todo is posted.

    }
}
