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
 * @todo interface-contract
 */
final class EventBus
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


    public function dispatch(Event $event) : void
    {
        $this->setEventQueue([$event]);


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
    ) : Listener {

        try {
            $listener = new $listenerClassName;
        } catch (\Exception $exception) {
            $this->setDispatching(false);
            throw new EventListenerNotFound($listenerClassName);
        }
        return $listener;
    }



    /**
     * Gets the Dispatching.
     *
     * @return bool
     */
    public function isDispatching()
    {
        return $this->dispatching;
    }


    /**
     * Gets the EventQueue.
     *
     * @return array
     */
    public function getEventQueue()
    {
        return $this->eventQueue;
    }


    /**
     * Gets the ListenersQueue.
     *
     * @return array
     */
    public function getListenersQueue()
    {
        return $this->listenersQueue;
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