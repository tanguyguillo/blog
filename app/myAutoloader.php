<?php

/**
 *  function making working classes
 *
 * @param [type] $class
 * @return void
 */
function my_autoloader($class)
{
    $delim = '\\';
    $myArray = explode($delim, $class);
    $newarray = array_slice($myArray, 1, -1);
    $delim = "/";
    $class2 = implode($delim, $newarray);
    $path = (ROOT . "/app/" . $class2 . ".php");

    if (file_exists($path)) {
        $found = true;
        require $path;
    }
}
spl_autoload_register('my_autoloader');
