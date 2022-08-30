
<?php session_start();

use Application\Router\Router;

define('ROOT', dirname(__DIR__));

// if cookie or session present
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}

// Config
require_once(ROOT . '/app/config/config.php');

// autoloader
require_once(ROOT . '/vendor/autoload.php');

// build my own autoloader
require_once(ROOT . '/app/myAutoloader.php');

$router = new Router();
$router->myRouter($_GET, $_POST);
