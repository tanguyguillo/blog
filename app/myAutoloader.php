<?php

/**
 * function my_autoloader
 *
 * @param  [string] $class
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
        include $path;
    }
}
spl_autoload_register('my_autoloader');
