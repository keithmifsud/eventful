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
 * The event subscriber interface.
 */
interface Subscriber
{


    /**
     * Gets the event listeners of an event.
     *
     * @param string $eventClassName
     * @return array
     */
    public function getEventListenersClassNames(string $eventClassName) : array ;
}