<?php declare(strict_types=1);

/**
 * This file is part of Eventful
 *
 * @licence Please view the Licence file supplied with this source code.
 *
 * @author Keith Mifsud <http://www.keith-mifsud.me>
 *
 * @copyright Keith Mifsud ${YEAR} <mifsud.k@gmail.com>
 *
 * @since   1.0
 * @version 1.0 Initial Release
 */



namespace Eventful\Example\ToDo;

/**
 * Simple example aggregate root.
 *
 * A todo is simply a task which needs to be done.
 * It has a description of what needs doing and a status of either todo or done.
 *
 */
class ToDo
{

    /**
     * @var string
     */
    protected $description;


    /**
     * @var string
     */
    protected $status;
}