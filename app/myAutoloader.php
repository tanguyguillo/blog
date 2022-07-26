<?php

/**
 *  function making working autoload
 * 
 * autododer of composer do for exemple : Application\Controllers\DetailController\DetailController (X2) 
 * if 's constrain me to use require before this function my_autoloader($class)
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
        require $path;
    }
}
spl_autoload_register('my_autoloader');
