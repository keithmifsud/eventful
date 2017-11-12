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
    'eventful-commands' => __DIR__ . '../config/eventful-commands.php'
];

$commandSubscriber = new \Eventful\Command\CommandSubscriber(
    $configuration['eventful-commands']
);

$commandBus = new \Eventful\Command\CommandBus($commandSubscriber);