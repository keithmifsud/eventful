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
 * A contract for the event listener wrapper.
 */
interface ListenerWrapper
{


    /**
     * Handles the listener's tasks.
     *
     */
    public function handle(): void;


    /**
     * Checks if the listener is handled.
     *
     */
    public function isHandled(): bool ;
}