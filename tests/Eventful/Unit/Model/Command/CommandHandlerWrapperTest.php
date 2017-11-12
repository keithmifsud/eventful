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

namespace Eventful\Test\Unit\Model\Command;

use Eventful\Command\CommandHandlerWrapper;
use Eventful\Test\TestCase;

/**
 * Tests for the command handler wrapper.
 */
class CommandHandlerWrapperTest extends TestCase
{

    /**
     * Tests that a command is marked as handled when it is handled.
     *
     * @test
     */
    public function it_is_handled()
    {
        $wrapper = new CommandHandlerWrapper(
            new ValidCommand(),
            new ValidCommandHandler()
        );
        $wrapper->handle();
        $this->assertTrue($wrapper->isHandled());
    }
}
