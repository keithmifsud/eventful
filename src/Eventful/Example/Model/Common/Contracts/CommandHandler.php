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


namespace Eventful\Example\Model\Common\Contracts;

/**
 * An example contract for a command handler.
 */
interface CommandHandler
{


    /**
     * Handles the command.
     *
     * @param Command $command
     */
    public function handle(Command $command) : void;
}