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


namespace Eventful\Example\Model\ToDo\Command;

use Eventful\Example\Model\Common\Contracts\Command;


/**
 * Example command class to post a ToDo.
 */
final class PostTodo implements Command
{

    /**
     * @var string
     */
    protected $description;


    /**
     * PostTodo constructor.
     *
     * @param string $description
     */
    public function __construct(string $description)
    {
        $this->description = $description;
    }


    /**
     * Gets the Description.
     *
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

}