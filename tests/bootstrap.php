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


if (file_exists($file = __DIR__ . '/../vendor/autoload.php')) {
    $loader = require $file;
    $loader->add('Eventful', __DIR__);
} else {
    throw new RuntimeException(
        'Composer autoload file not found and is required to run tests.'
    );
}