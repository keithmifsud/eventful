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


namespace Eventful\Example\ToDo\Handler;

use Eventful\Example\Model\Common\Contracts\Command;
use Eventful\Example\Model\Common\Contracts\CommandHandler;
use Eventful\Example\ToDo\Command\PostTodo;
use Eventful\Example\ToDo\ToDo;

/**
 * Example PostToDo command handler.
 *
 */
final class PostToDoHandler implements CommandHandler
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