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

use Eventful\Event\Exception\EventListenerNotFound;


/**
 * The event bus
 *
 */
final class EventBus implements Bus
{

    /**
     * @var bool
     */
    protected $dispatching;


    /**
     * @var array
     */
    protected $eventQueue;


    /**
     * @var array
     */
    protected $listenersQueue;


    /**
     * @var Subscriber
     */
    protected $subscriber;


    /**
     * EventBus constructor.
     *
     * @param Subscriber $subscriber
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->setDispatching(false);
        $this->setEventQueue([]);
        $this->setListenersQueue([]);
        $this->setSubscriber($subscriber);
    }


    /**
     * Dispatches the event.
     *
     * @param Event $event
     * @throws \Exception
     */
    public function dispatch(Event $event): void
    {
        $this->setEventQueue([$event]);

        if (!$this->isDispatching()) {
            $this->setDispatching(true);
        }

        $eventName = get_class($event);

        try {
            $listeners = $this->subscriber->getEventListenersClassNames(
                $eventName
            );
        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw $exception;
        }

        $this->setListenersQueue($listeners);

        $index = 0;

        foreach ($this->listenersQueue as $listener) {

            $listenerClass = $this->getListenerClassInstance($listener);

            $toHandle = new EventListenerWrapper(
                $listenerClass,
                $event
            );

            try {
                $toHandle->handle();
            } catch (\Exception $exception) {
                $this->setDispatching(false);
                throw $exception;
            }

            unset($this->listenersQueue[$index]);
            ++$index;
        }


        $this->setEventQueue([]);
        $this->setDispatching(false);
    }


    /**
     * Gets the Dispatching.
     *
     * @return bool
     */
    public function isDispatching() : bool
    {
        return $this->dispatching;
    }


    /**
     * Gets the EventQueue.
     *
     * @return array
     */
    public function getEventQueue() : array
    {
        return $this->eventQueue;
    }


    /**
     * Gets the ListenersQueue.
     *
     * @return array
     */
    public function getListenersQueue() : array
    {
        return $this->listenersQueue;
    }


    /**
     * Gets the listener class instance.
     *
     * @param string $listenerClassName
     * @return Listener
     * @throws EventListenerNotFound
     */
    protected function getListenerClassInstance(
        string $listenerClassName
    ): Listener {

        try {
            $listener = new $listenerClassName;
        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw new EventListenerNotFound($listenerClassName);
        }
        return $listener;
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
     * Sets the EventQueue.
     *
     * @param array $eventQueue
     */
    protected function setEventQueue(array $eventQueue)
    {
        $this->eventQueue = $eventQueue;
    }


    /**
     * Sets the ListenersQueue.
     *
     * @param array $listenersQueue
     */
    protected function setListenersQueue(array $listenersQueue)
    {
        $this->listenersQueue = $listenersQueue;
    }


    /**
     * Sets the Subscriber.
     *
     * @param Subscriber $subscriber
     */
    protected function setSubscriber(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

}