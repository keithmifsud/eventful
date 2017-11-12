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

use Eventful\Command\Exception\CommandHandlerNotFound;
use Eventful\Command\Exception\CommandNotFound;

/**
 * The command bus.
 *
 */
final class CommandBus implements Bus
{


    /**
     * @var bool
     */
    protected $dispatching;


    /**
     * @var array
     */
    protected $queue;


    /**
     * @var CommandSubscriber
     */
    protected $subscriber;


    /**
     * CommandBus constructor.
     *
     * @param CommandSubscriber $subscriber
     */
    public function __construct(CommandSubscriber $subscriber)
    {
        $this->setDispatching(false);
        $this->setQueue([]);
        $this->setSubscriber($subscriber);
    }


    /**
     * Dispatches the command.
     *
     * @param Command $command
     * @throws CommandHandlerNotFound
     * @throws \Exception
     */

    public function dispatch(Command $command): void
    {
        $this->setQueue([$command]);

        if (!$this->isDispatching()) {
            $this->setDispatching(true);
        }

        $commandName = get_class($command);

        try {

            $handler = $this->subscriber
                ->getCommandHandlerClassName($commandName);

        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw $exception;
        }

        $toHandle = new CommandHandlerWrapper(
            $command,
            $this->getHandlerClassInstance($handler)
        );

        try {
            $toHandle->handle();
        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw $exception;
        }

        $this->setQueue([]);
        $this->setDispatching(false);
    }


    /**
     * Gets the Dispatching.
     *
     * @return bool
     */
    public function isDispatching(): bool
    {
        return $this->dispatching;
    }


    /**
     * Gets the Queue.
     *
     * @return array
     */
    public function getQueue(): array
    {
        return $this->queue;
    }


    /**
     * Gets an instance of the handler class.
     *
     * @param string $handlerClassName
     * @return CommandHandler
     * @throws CommandHandlerNotFound
     */
    protected function getHandlerClassInstance(
        string $handlerClassName
    ): CommandHandler {

        try {
            $handler = new $handlerClassName;
        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw new CommandHandlerNotFound($handlerClassName);
        }
        return $handler;
    }


    /**
     * Sets the Dispatching.
     *
     * @param bool $dispatching
     */
    protected function setDispatching(bool $dispatching)
    {
        $this->dispatching = $dispatching;
    }


    /**
     * Sets the Queue.
     *
     * @param array $queue
     */
    protected function setQueue(array $queue)
    {
        $this->queue = $queue;
    }


    /**
     * Sets the Subscriber.
     *
     * @param CommandSubscriber $subscriber
     */
    protected function setSubscriber(CommandSubscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }
}