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


/**
 * An example application bootstrap file.
 *
 * Loads the dependencies.
 */

$dependencies = require __DIR__ . '/../../../../vendor/autoload.php';

$configuration = [
    'eventful_commands' => __DIR__ . '../config/eventful-commands.php',
    'eventful_events' => __DIR__ . '../config/eventful-events.php'
];

/**
 * Set up the command subscriber.
 */
$commandSubscriber = new \Eventful\Command\CommandSubscriber(
    $configuration['eventful_commands']
);

/**
 * Instantiate the command bus.
 */
$commandBus = new \Eventful\Command\CommandBus($commandSubscriber);


/**
 * Set up the event subscriber.
 */
$eventSubscriber = new \Eventful\Event\EventSubscriber(
    $configuration['eventful_events']
);


/**
 * Instantiate the event bus.
 */
$eventBus = new \Eventful\Event\EventBus($eventSubscriber);