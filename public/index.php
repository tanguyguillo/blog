<?php

define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega" yesy

// see autoloader ....
//Loading controller files, we need then
require_once(ROOT.'/app/controllers/postsController.php');
require_once(ROOT.'/app/controllers/HomepageController.php');

// autoload
// autoloader
///require_once('../config/config.php');
require_once(ROOT.'/vendor/autoload.php');


// in the controller we only use the controllers witch is the "chef d'orchestre" du MVC's model"
// we look for one method : for exemple Homepage/Homepage (the second Homepage is the method (function of this class))
use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
//use Application\Controllers;






try {
    // to get listingPage : index.php?posts=bloglist 
    if ($_GET['posts'] === 'bloglist') {
        var_dump('passage 1');
      
        // echo "test " . $_GET['posts'] ; // OK    //http://blog-omega.local/index.php?posts=bloglist
        (new PostsController())->execute();

    //} elseif (isset($_GET['post']) && $_GET['post'] > 0) {

            //$id = $_GET['post'];

            //var_dump($id);
    
    } else {
        (new HomepageController())->execute();
    }



} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('../app/views/error.php');
}






/*try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}*/
