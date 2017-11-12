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

/**
 * A wrapper for command handlers.
 *
 */
final class CommandHandlerWrapper implements HandlerWrapper
{

    /**
     * @var bool
     */
    protected $handled;


    /**
     * @var CommandHandler
     */
    protected $handler;


    /**
     * @var Command
     */
    protected $command;


    /**
     * CommandHandlerWrapper constructor.
     *
     * @param Command        $command
     * @param CommandHandler $handler
     *
     */
    public function __construct(Command $command, CommandHandler $handler)
    {
        $this->setHandled(false);
        $this->setCommand($command);
        $this->setHandler($handler);
    }


    /**
     * Handles the command.
     *
     */
    public function handle(): void
    {
        $this->handler->handle($this->command);
        $this->setHandled(true);
    }


    /**
     * Gets the Handled.
     *
     * @return bool
     */
    public function isHandled() : bool
    {
        return $this->handled;
    }


    /**
     * Sets the Handled.
     *
     * @param bool $handled
     */
    protected function setHandled(bool $handled)
    {
        $this->handled = $handled;
    }


    /**
     * Sets the Command.
     *
     * @param Command $command
     */
    protected function setCommand(Command $command)
    {
        $this->command = $command;
    }


    /**
     * Sets the Handler.
     *
     * @param CommandHandler $handler
     */
    protected function setHandler(CommandHandler $handler)
    {
        $this->handler = $handler;
    }

}