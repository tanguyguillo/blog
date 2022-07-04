<?php
define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega" yes

//Loading controller files, we need then
require_once(ROOT . '/app/controllers/postsController.php');
require_once(ROOT . '/app/controllers/HomepageController.php');

// autoloader
require_once(ROOT . '/vendor/autoload.php');

// in the controller we only use the controllers witch is the "chef d'orchestre" du MVC's model"
// we look for one method : for exemple Homepage/Homepage (the second Homepage is the method (function of this class))
use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;



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
                $id = $_GET['id'];
                // (new PostsController())->executePost($id);
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
