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


namespace Eventful\Test\Unit\Model\Event;


use Eventful\Event\Event;
use Eventful\Event\Listener;


/**
 * A valid event listener for testing.
 */
final class ValidListener implements Listener
{

    /**
     * Handles the listener's tasks.
     *
     * @param Event $event
     */
    public function handle(Event $event) : void
    {
        // do something.
    }
}