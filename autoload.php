<?php
/*
 * This file is part of the BRO-Project.
 *
 * (c) BRO - FHV
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

define('BASE_PATH', realpath(dirname(__FILE__)));
function lib_autoloader($class)
{
    $filename = BASE_PATH . '/lib/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}

function src_autoloader($class)
{
    $filename = BASE_PATH . '/src/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}

spl_autoload_register('lib_autoloader');
spl_autoload_register('src_autoloader');
