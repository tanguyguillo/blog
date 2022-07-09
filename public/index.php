

<?php
define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega" yes != BASEURL

use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController\DetailController;
use Application\Controllers\InsscriptionController\InscriptionController;

// autoloader
require_once(ROOT . '/vendor/autoload.php');
// Config
require_once(ROOT . '/app/config/config.php');
require_once(ROOT . '/app/config/required.php');

// perhaps there is a problem beetwen php 8 of Mamp et Php 8 oo the mac ? .... to see... perhaps on line it 'll works without those requires?


/**
 * $identifier is a string
 */
try {
    // just for instance....
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'inscription') {
            (new InscriptionController())->execute();
            exit;
        }
    }

    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'bloglist') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new DetailController())->Detail($identifier);
            } else {
                (new PostsController())->executePosts();
            }
        } elseif ($_GET['owp'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
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
