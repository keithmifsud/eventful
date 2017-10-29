<?php declare(strict_types=1);

/**
 * This file is part of eventful
 *
 * @licence   Please view the Licence file supplied with this source code.
 *
 * @author    Keith Mifsud <http://www.keith-mifsud.com>
 *
 * @copyright Keith Mifsud 2017
 *
 * @since     1.0
 * @version   1.0 Initial Release
 */


namespace Eventful\Test\Example;


use Broadway\CommandHandling\Testing\CommandHandlerScenarioTestCase;
use Broadway\UuidGenerator\Rfc4122\Version4Generator;
use Eventful\Test\TestCase;

/**
 * Tests for an example command handler which handles the DoItCommand
 *
 */
class DoItCommandHandlerTest extends CommandHandlerScenarioTestCase
{

    private $generator;


    public function setUp()
    {
        parent::setUp();
        $this->generator = new Version4Generator();
    }


    protected function createCommandHandler()
    {
        
    }
}