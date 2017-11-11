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



namespace Eventful\Example\Model\ToDo;

/**
 * Simple example aggregate root.
 *
 * A todo is simply a task which needs to be done.
 * It has a description of what needs doing and a status of either open or done.
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


    /**
     * Posts a new todo.
     *
     * @param string $description
     * @return ToDo
     */
    public static function post(string $description)
    {
        return new self(
            $description,
            'open'
        );
    }



    /**
     * ToDo constructor.
     *
     * @param string $description
     * @param string $status
     */
    private function __construct(string $description, string $status)
    {
        $this->setDescription($description);
        $this->setStatus($status);
    }


    /**
     * Gets the Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Gets the Status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Sets the Description.
     *
     * @param string $description
     */
    protected function setDescription(string $description)
    {
        $this->description = $description;
    }


    /**
     * Sets the Status.
     *
     * @param string $status
     */
    protected function setStatus(string $status)
    {
        $this->status = $status;
    }


}