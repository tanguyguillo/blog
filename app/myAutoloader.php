<?php
// anonym function... not resolve my issue
function my_autoloader($class) // see later
{
    $delim = '\\';
    $myArray = explode($delim, $class);
    $newarray = array_slice($myArray, 1, -1);
    $delim = "/";
    $class2 = implode($delim, $newarray);
    $path = (ROOT . "/app/" . $class2 . ".php");
    include $path;
}
//spl_autoload_register('my_autoloader');
