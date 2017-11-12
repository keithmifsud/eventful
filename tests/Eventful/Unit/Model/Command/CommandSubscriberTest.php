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

namespace Eventful\Test\Unit\Model\Command;

use Eventful\Command\CommandSubscriber;
use Eventful\Example\Model\ToDo\Command\PostTodo;
use Eventful\Example\Model\ToDo\Handler\PostToDoCommandHandler;
use Eventful\Test\TestCase;

/**
 * Tests for the command subscriber.
 */
class CommandSubscriberTest extends TestCase
{

    /**
     * Tests that an exception is thrown when initiated
     * with an invalid command.
     *
     * @test
     * @expectedException \Eventful\Command\Exception\InvalidCommand
     */
    public function it_throws_exception_when_command_is_invalid()
    {
        $commandsWithHandlers = [
            InvalidCommand::class => ValidCommandHandler::class
        ];
        $subscriber = new CommandSubscriber($commandsWithHandlers);
    }


    /**
     * Tests that an exception is thrown when initiated
     * with an invalid command handler.
     *
     * @test
     * @expectedException \Eventful\Command\Exception\InvalidCommandHandler
     */
    public function it_throws_exception_when_handler_is_invalid()
    {
        $commandsWithHandlers = [
            ValidCommand::class => InValidCommandHandler::class
        ];
        $subscriber = new CommandSubscriber($commandsWithHandlers);
    }


    /**
     * Tests that it can get the handler of a command.
     *
     * @test
     */
    public function it_can_get_a_command_handler()
    {
        $commandsWithHandlers = [
            ValidCommand::class => ValidCommandHandler::class,
            PostTodo::class => PostToDoCommandHandler::class
        ];
        $subscriber = new CommandSubscriber($commandsWithHandlers);

        $this->assertEquals(
            PostToDoCommandHandler::class,
            $subscriber->getCommandHandlerClassName(PostTodo::class)
        );
    }


    /**
     * Tests that an exception is thrown when attempting
     * to get a command which is not subscribed.
     *
     * @test
     * @expectedException \Eventful\Command\Exception\CommandNotFound
     */
    public function it_throws_exception_when_command_is_not_found()
    {
        $commandsWithHandlers = [
            ValidCommand::class => ValidCommandHandler::class
        ];
        $subscriber = new CommandSubscriber($commandsWithHandlers);
        $subscriber->getCommandHandlerClassName(
            PostTodo::class
        );
    }



}
