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

use Eventful\Event\Exception\InvalidEvent;
use Eventful\Event\Exception\EventNotFound;
use Eventful\Event\Exception\InvalidEventListener;

/**
 * Subscribes of events and listeners.
 *
 */
final class EventSubscriber implements Subscriber
{

    /**
     * @var array
     */
    protected $eventsWithListeners;


    /**
     * EventSubscriber constructor.
     *
     * @param array $eventsWithListeners
     * @throws InvalidEventListener | InvalidEvent
     */
    public function __construct(array $eventsWithListeners)
    {
        $this->setEventsWithListeners($eventsWithListeners);
    }


    /**
     * Gets the listeners of an event.
     *
     * @param string $eventClassName
     * @return array
     * @throws EventNotFound
     */
    public function getEventListenersClassNames(string $eventClassName): array
    {
        if (!array_key_exists($eventClassName, $this->eventsWithListeners)) {
            throw new EventNotFound($eventClassName);
        }
        return $this->eventsWithListeners[$eventClassName];
    }


    /**
     * Subscribes and sets the events and their listeners.
     *
     * @param array $eventsWithListeners
     * @throws InvalidEvent
     * @throws InvalidEventListener
     */
    protected function setEventsWithListeners(array $eventsWithListeners)
    {
        $validEventsWithListeners = [];

        foreach ($eventsWithListeners as $event => $listeners) {

            if (!$this->isValidEvent($event)) {
                throw new InvalidEvent(
                    'Invalid event class: ' . $event
                );
            }

            foreach ($listeners as $listener) {
                if (!$this->isValidEventListener($listener)) {
                    throw new InvalidEventListener(
                        'Invalid event listener class: ' . $listener
                    );
                }
            }

            $validEventsWithListeners[$event] = $listeners;
        }

        $this->eventsWithListeners = $validEventsWithListeners;
    }


    /**
     * Determines whether an event is valid or not.
     *
     * @param string $eventClass
     * @return bool
     */
    private function isValidEvent(string $eventClass): bool
    {
        $eventInterface = Event::class;
        $implementedInterfaces = class_implements($eventClass);

        foreach ($implementedInterfaces as $implementedInterface) {
            if ($implementedInterface === $eventInterface) {
                return true;
            }
        }
        return false;
    }


    /**
     * Determines whether the listeners class in valid.
     *
     * @param string $listenerClass
     * @return bool
     */
    private function isValidEventListener(string $listenerClass): bool
    {
        $listenerInterface = Listener::class;
        $implementedInterfaces = class_implements($listenerClass);

        foreach ($implementedInterfaces as $implementedInterface) {
            if ($implementedInterface === $listenerInterface) {
                return true;
            }
        }
        return false;
    }

}