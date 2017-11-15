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


namespace Eventful\Test\Unit\Model\Domain\Adaptor;


use Eventful\Common\Adaptor\Enumerator;


/**
 * An enumerator we can test against.
 *
 */
class TestableEnumerator extends Enumerator
{

    const TESTED = 'tested';

    const NOT_TESTED = 'not_tested';
}