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


namespace Eventful\Event;


/**
 * A wrapper for event listeners.
 *
 */
final class EventListenerWrapper implements ListenerWrapper
{

    /**
     * @var bool
     */
    protected $handled;


    /**
     * @var Listener
     */
    protected $listener;


    /**
     * @var Event
     */
    protected $event;


    /**
     * EventListenerWrapper constructor.
     *
     * @param Listener $listener
     * @param Event    $event
     */
    public function __construct(Listener $listener, Event $event)
    {
        $this->setHandled(false);
        $this->setListener($listener);
        $this->setEvent($event);
    }


    /**
     * Handles the listener's tasks.
     *
     */
    public function handle(): void
    {
        $this->listener->handle($this->event);
        $this->setHandled(true);
    }


    /**
     * Gets the Handled.
     *
     * @return bool
     */
    public function isHandled(): bool
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
     * Sets the Listener.
     *
     * @param Listener $listener
     */
    protected function setListener(Listener $listener)
    {
        $this->listener = $listener;
    }


    /**
     * Sets the Event.
     *
     * @param Event $event
     */
    protected function setEvent(Event $event)
    {
        $this->event = $event;
    }

}