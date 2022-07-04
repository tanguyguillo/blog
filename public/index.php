<?php
define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega" yes

use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController;
use Application\Controllers\DetailController\DetailController as DetailControllerDetailController;

// autoloader
require_once(ROOT . '/vendor/autoload.php');
//Loading controller files, we need then
require_once(ROOT . '/app/controllers/HomepageController.php');
require_once(ROOT . '/app/controllers/PostsController.php');
require_once(ROOT . '/app/controllers/DetailController.php');


/*try {
    // to get listingPage Url : index.php?posts=bloglist 
    if ($_GET['owp'] === 'bloglist') {
        (new PostsController())->execute();
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('../app/views/error.php');
}*/


//-----------
try {
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'bloglist') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new DetailControllerDetailController())->executeDetail($identifier);
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
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
