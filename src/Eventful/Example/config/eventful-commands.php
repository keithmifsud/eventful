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


/**
 * An array of commands and their handlers.
 *
 * You should be able to place this file anywhere or not even need at
 * all. Provided you send an array of commands and their handlers to the
 * command bus constructor.
 */

$commandsWithHandlers = [

    // Command => Command Handler

    \Eventful\Example\Model\ToDo\Command\PostTodo::class =>
        \Eventful\Example\Model\ToDo\Handler\PostToDoCommandHandler::class,
];

return $commandsWithHandlers;