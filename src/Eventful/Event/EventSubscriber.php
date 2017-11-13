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
 * Subscribes of events and listeners.
 *
 * @todo interface
 */
final class EventSubscriber
{

    /**
     * @var array
     */
    protected $eventsWithListeners;


    /**
     * EventSubscriber constructor.
     *
     * @param array $eventsWithListeners
     */
    public function __construct(array $eventsWithListeners)
    {
        $this->setEventsWithListeners($eventsWithListeners);
    }


    /**
     * Sets the EventsWithListeners.
     *
     * @param array $eventsWithListeners
     */
    protected function setEventsWithListeners(array $eventsWithListeners)
    {
        $this->eventsWithListeners = $eventsWithListeners;
    }


    private function isValidEvent(string $eventClass) : bool
    {

    }


    private function isValidEventListener(string $subscriberClass) : bool
    {

    }




}