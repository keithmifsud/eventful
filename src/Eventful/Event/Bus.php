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
 * Contract for an event bus.
 */
interface Bus
{

    /**
     * Dispatches the event to its listeners.
     *
     * @param Event $event
     */
    public function dispatch(Event $event): void;


    /**
     * Checks if the bus is dispatching.
     *
     * @return bool
     */
    public function isDispatching(): bool;


    /**
     * Gets the queued events.
     *
     * @return array
     */
    public function getEventQueue(): array;


    /**
     * Gets the queued listeners.
     *
     * @return array
     */
    public function getListenersQueue(): array;
}
