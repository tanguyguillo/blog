<?php
// see autoloader ....
require_once('../app/controllers/posts.php');
require_once('../app/controllers/homepage.php');
require_once('../app/lib/database.php');

use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Posts\Posts;

try {
    // to get listingPage : index.php?posts=bloglist
    if ($_GET['posts'] === 'bloglist') {
        // echo "test " . $_GET['posts'] ; // OK    //http://blog-omega.local/index.php?posts=bloglist
        (new Posts())->execute();
    } else {
        (new Homepage())->execute();
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
