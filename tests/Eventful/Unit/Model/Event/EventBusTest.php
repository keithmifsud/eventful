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

use Eventful\Event\EventBus;
use Eventful\Event\EventSubscriber;
use Eventful\Test\TestCase;


/**
 * Tests for the event bus.
 */
class EventBusTest extends TestCase
{


    /**
     * It dispatches events.
     *
     * @test
     */
    public function it_dispatches_the_event()
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
        $bus = new EventBus($subscriber);

        $bus->dispatch(new ValidEvent());

        $this->assertTrue(empty($bus->getEventQueue()));
        $this->assertTrue(empty($bus->getListenersQueue()));
        $this->assertFalse($bus->isDispatching());
    }


    // test how many times a method is called.
}
