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


namespace Eventful\Example\app\Services\ToDo;

use Eventful\Command\Bus;
use Eventful\Example\Model\ToDo\Command\PostTodo;


/**
 * An application service for posting a new to do.
 *
 */
final class PostNewToDo
{

    /**
     * @var Bus
     */
    protected $commandBus;


    /**
     * PostNewToDo constructor.
     *
     * @param Bus $commandBus
     */
    public function __construct(Bus $commandBus)
    {
        $this->commandBus = $commandBus;
    }


    /**
     * Executes the service.
     *
     * @param string $description
     */
    public function execute(string $description): void
    {
        $postTodo = new PostTodo($description);

        $this->commandBus->dispatch($postTodo);
    }

}