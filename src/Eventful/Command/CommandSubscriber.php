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


namespace Eventful\Command;

use Eventful\Command\Exception\CommandAlreadySubscribed;
use Eventful\Command\Exception\InvalidCommand;
use Eventful\Command\Exception\InvalidCommandHandler;

/**
 * The command subscriber.
 *
 * @Todo implement an interface.
 */
final class CommandSubscriber
{

    /**
     * @var array
     */
    protected $commandsWithHandlers;


    /**
     * CommandSubscriber constructor.
     *
     * @param array $commandsWithHandlers
     * @throws InvalidCommand | InvalidCommandHandler
     */
    public function __construct(array $commandsWithHandlers)
    {
        $this->setCommandsWithHandlers($commandsWithHandlers);
    }


    /**
     * Gets the handler's class name.
     *
     * @param string $command
     * @return string
     */
    public function getCommandHandlerClassName(string $command) : string
    {
        return $this->commandsWithHandlers[$command];
    }


    /**
     * Sets the commands with handlers.
     *
     * @param array $commandsWithHandlers
     * @throws InvalidCommand
     * @throws InvalidCommandHandler
     */
    protected function setCommandsWithHandlers(array $commandsWithHandlers
    ): void {

        $validCommandsWithHandlers = [];

        foreach ($commandsWithHandlers as $command => $handler) {

            if (!$this->isValidCommand($command)) {
                throw new InvalidCommand(
                    'Invalid command class: ' . $command
                );
            }

            if (! $this->isValidHandler($handler)) {
                throw new InvalidCommandHandler(
                    'Invalid command handler class: ' .$handler
                );
            }

            $validCommandsWithHandlers[$command] = $handler;
        }

        $this->commandsWithHandlers = $validCommandsWithHandlers;
    }


    /**
     * Determines if the command class is valid.
     *
     * @param string $commandClass
     * @return bool
     */
    private function isValidCommand(string $commandClass): bool
    {
        $commandInterface = Command::class;
        $implementedInterfaces = class_implements($commandClass);

        foreach ($implementedInterfaces as $implementedInterface) {
            if ($implementedInterface === $commandInterface) {
                return true;
            }
        }
        return false;
    }


    /**
     * Determines whether the handler class is valid.
     *
     * @param string $handlerClass
     * @return bool
     */
    private function isValidHandler(string $handlerClass): bool
    {
        $handlerInterface = CommandHandler::class;
        $implementedInterfaces = class_implements($handlerClass);

        foreach ($implementedInterfaces as $implementedInterface) {
            if ($implementedInterface === $handlerInterface) {
                return true;
            }
        }
        return false;
    }
}