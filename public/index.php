
<?php
session_start();


define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega"


// var_dump($postData);

// if ($_Post['action'] == 'newUser') {
//     viewAddUser();
// }

// if (isset($postData['userEmail']) &&  isset($postData['userPassword'])) {
// }


use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController\DetailController;
use Application\Controllers\InsscriptionController\InscriptionController;
use Application\Controllers\connexion\ConnexionController;


// Config
require_once(ROOT . '/app/config/config.php');
require_once(ROOT . '/app/config/required.php');

// autoloader
require_once('../vendor/autoload.php');

//// to test speudo class ....
//     spl_autoload_register(function ($class)
// {
//     require '../../class/' . $class . '.php';}

/**
 * $identifier is a string... but must be a integer
 */

// todo use isInteger function

$postData = $_POST; // for user's
try {
    // just for instance....
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'inscription') {
            (new InscriptionController())->inscription();
            exit; // to review
        }
        if ($_GET['owp'] === 'connexion') {
            (new ConnexionController())->connexion();
            exit; // to review
        }

        // from page connexion : redirection to comment
        if ($_GET['owp'] === 'detailconnexion') {
            (new detailController())->detailconnexion($postData);
            exit; // to review
        }
    }

    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'bloglist') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $identifier = strip_tags(htmlspecialchars($identifier));
                (new DetailController())->Detail($identifier);
            } else {
                (new PostsController())->executePosts();
            }
        } elseif ($_GET['owp'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $identifier = strip_tags(htmlspecialchars($identifier));
                //  (new AddComment())->execute($identifier, $_POST);
            } else {
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
    require(ROOT . '/app/templatesError/error.php');

    // $errorMessage = $e->getMessage();
    // (new ErrorController())->execute($errorMessager);
}
