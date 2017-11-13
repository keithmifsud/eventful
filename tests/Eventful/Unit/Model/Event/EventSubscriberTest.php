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

namespace Eventful\Test\Unit\Model\Event;

use Eventful\Event\EventSubscriber;
use Eventful\Event\Exception\EventNotFound;
use Eventful\Event\Exception\InvalidEventListener;
use Eventful\Example\Model\ToDo\Event\ToDoWasPosted;
use Eventful\Test\TestCase;


/**
 * Tests for the event subscriber.
 */
class EventSubscriberTest extends TestCase
{

    /**
     * Tests that an exception is thrown when trying to subscribe an
     * invalid event.
     *
     * @test
     * @expectedException \Eventful\Event\Exception\InvalidEvent
     */
    public function it_throws_exception_when_event_is_invalid()
    {
        $eventsWithListeners = [
            InvalidEvent::class => [
                ValidListener::class
            ]
        ];
        $subscriber = new EventSubscriber($eventsWithListeners);
    }


    /**
     * Test that an exception is thrown when trying to subscribe an
     * invalid event listener.
     *
     * @test
     * @expectedException \Eventful\Event\Exception\InvalidEventListener
     */
    public function it_throws_exception_when_listener_is_invalid()
    {
        $eventsWithListeners = [
            ValidEvent::class => [
                InValidListener::class
            ]
        ];
        $subscriber = new EventSubscriber($eventsWithListeners);
    }


    /**
     * Tests that it can get the event listener for the event.
     *
     * @test
     */
    public function it_can_get_am_event_listener()
    {
        $eventsWithListeners = [
            ValidEvent::class => [
                ValidListener::class
            ]
        ];
        $subscriber = new EventSubscriber($eventsWithListeners);

        $this->assertEquals(
            ValidListener::class,
            $subscriber->getEventListenersClassNames(ValidEvent::class)[0]
        );
    }

    // Test getting all listeners


    /**
     * Tests that it gets all listeners of ab event.
     *
     * @test
     */
    public function it_can_get_all_event_listeners_of_an_event()
    {
        $eventsWithListeners = [
            ToDoWasPosted::class => [
                \Eventful\Example\Projection\Tasks\Listener\WhenToDoIsPosted::class,
                \Eventful\Example\Projection\Calendar\Listener\WhenToDoIsPosted::class
            ],

            \Eventful\Example\Model\ToDo\Event\ToDoDescriptionWasChanged::class => [
                \Eventful\Example\Projection\Tasks\Listener\WhenToDoDescriptionIsChanged::class
            ]
        ];
        $subscriber = new EventSubscriber($eventsWithListeners);

        $this->assertEquals(
            2,
            count($subscriber->getEventListenersClassNames(
                ToDoWasPosted::class
            ))
        );
    }


    /**
     * Tests that an exception is thrown when trying to get a listener of
     * an event which is not subscribed.
     *
     * @test
     * @expectedException \Eventful\Event\Exception\EventNotFound
     */
    public function it_throws_exception_when_event_is_not_found()
    {
        $eventsWithListeners = [
            ToDoWasPosted::class => [
                \Eventful\Example\Projection\Tasks\Listener\WhenToDoIsPosted::class,
                \Eventful\Example\Projection\Calendar\Listener\WhenToDoIsPosted::class
            ],

            \Eventful\Example\Model\ToDo\Event\ToDoDescriptionWasChanged::class => [
                \Eventful\Example\Projection\Tasks\Listener\WhenToDoDescriptionIsChanged::class
            ]
        ];
        $subscriber = new EventSubscriber($eventsWithListeners);

        $subscriber->getEventListenersClassNames(ValidEvent::class);
    }
}
