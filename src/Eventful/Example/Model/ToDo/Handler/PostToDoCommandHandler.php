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


namespace Eventful\Example\Model\ToDo\Handler;

use Eventful\Command\Command;
use Eventful\Command\CommandHandler;
use Eventful\Example\Model\ToDo\Command\PostTodo;
use Eventful\Example\Model\ToDo\ToDo;

/**
 * Example PostToDo command handler.
 *
 */
final class PostToDoCommandHandler implements CommandHandler
{


    /**
     * Handles the command.
     *
     * @param PostTodo $command
     */
    public function handle(Command $command) : void
    {
        ToDo::post($command->getDescription());
    }
}