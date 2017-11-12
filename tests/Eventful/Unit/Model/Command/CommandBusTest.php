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

use Eventful\Command\CommandBus;
use Eventful\Command\CommandSubscriber;
use Eventful\Test\TestCase;


/**
 * Tests for the command bus.
 */
class CommandBusTest extends TestCase
{

    /**
     * Tests that it can dispatch commands.
     *
     * @test
     */
    public function it_dispatches_command()
    {
        $commandsWithHandlers = [
            ValidCommand::class => ValidCommandHandler::class
        ];
        $subscriber = new CommandSubscriber($commandsWithHandlers);
        $bus = new CommandBus($subscriber);

        $bus->dispatch(new ValidCommand());

        $this->assertTrue(empty($bus->getQueue()));
        $this->assertFalse($bus->isDispatching());
    }
}
