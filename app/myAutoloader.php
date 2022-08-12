<?php

/**
 *  function making working autoload using $class provided by composer
 *
 * autododer of composer do for exemple : Application\Controllers\DetailController\DetailController (DetailController\DetailController : X2)
 *
 * function
 *
 * @param [string] $class
 * @return void
 */
function my_autoloader($class)
{
    $delim = '\\';
    $myArray = explode($delim, $class);
    $newarray = array_slice($myArray, 1, -1);
    $delim = "/";
    $class2 = implode($delim, $newarray);

    $path = (dirname(__DIR__)  . "/app/" . $class2 . ".php");

    if (file_exists($path)) {
        require $path;
    }
}
spl_autoload_register('my_autoloader');
