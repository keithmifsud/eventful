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

namespace Eventful\Test\Unit\Model\Event;

use Eventful\Event\EventListenerWrapper;
use Eventful\Test\TestCase;


/**
 * Tests for the event listener wrapper.
 */
class EventListenerWrapperTest extends TestCase
{

    /**
     * Tests that an event listener is handled.
     *
     * @test
     */
    public function it_is_handled()
    {
        $wrapper =  new EventListenerWrapper(
            new ValidEvent(),
            new ValidListener()
        );

        $wrapper->handle();
        $this->assertTrue($wrapper->isHandled());
    }

}
