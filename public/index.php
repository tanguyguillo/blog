<?php
define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega" yes

use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController;
use Application\Controllers\DetailController\DetailController as DetailControllerDetailController;
//use Application\Controllers\ErrorController\ErrorController as ErrorController;


// autoloader
require_once(ROOT . '/vendor/autoload.php');
//Loading controller files, we need then
require_once(ROOT . '/app/controllers/HomepageController.php');
require_once(ROOT . '/app/controllers/PostsController.php');
require_once(ROOT . '/app/controllers/DetailController.php');
require_once(ROOT . '/app/controllers/ErrorController.php');

/**
 * $identifier is a string
 */
try {
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'bloglist') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new DetailControllerDetailController())->Detail($identifier);
            } else {
                (new PostsController())->executePosts();
            }
        } elseif ($_GET['owp'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                //  (new AddComment())->execute($identifier, $_POST);
            } else {
                // no id provide
                // (new PostsController())->execute();
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    // for instance
    $errorMessage = $e->getMessage();
    require(ROOT . '/app/templates/error.php');

    // $errorMessage = $e->getMessage();
    // (new ErrorController())->execute($errorMessager);
}
