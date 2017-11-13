<?php
/**b
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


/**
 * An array of events with an array of subscribers.
 *
 * You should be able to place this file anywhere or not even need at
 * all. Provided you send an array of events and their subscribers to the
 * event bus constructor.
 */

$eventsWithSubscribers = [

    // Event => [
    //  Subscriber,
    //  Subscriber
    //]

    \Eventful\Example\Model\ToDo\Event\ToDoWasPosted::class => [
        \Eventful\Example\Projection\Tasks\Listener\WhenToDoIsPosted::class,
        \Eventful\Example\Projection\Calendar\Listener\WhenToDoIsPosted::class
    ],

    \Eventful\Example\Model\ToDo\Event\ToDoDescriptionWasChanged::class => [
        \Eventful\Example\Projection\Tasks\Listener\WhenToDoDescriptionIsChanged::class
    ]
];

