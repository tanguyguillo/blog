<?php
// fot new rooter
use \App\Core\Main;

define('ROOT', dirname(__DIR__));  // upper folder

// autoloader Composer
require_once(ROOT . '/vendor/autoload.php');

//main is our router  
$app = new Main();
$app->start();
