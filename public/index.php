
<?php session_start();

define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega"

// if cookie or session present
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}

use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController\DetailController;
use Application\Controllers\InsscriptionController\InscriptionController;
use Application\Controllers\connexion\ConnexionController;

// Config
require_once(ROOT . '/app/config/config.php');
// requires
require_once(ROOT . '/app/config/required.php');
// autoloader
require_once(ROOT . '/vendor/autoload.php');  // /Users/Tanguy/Documents/sites/blog-omega/vendor/autoload.php" // the path is OK

/**
 * $identifier is a string... but also integer like "3"
 */

// todo use isInteger function

$postData = $_POST; // for user's
try {
    // just for instance....
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        // from page connexion : redirection to comment
        if ($_GET['owp'] === 'detailconnexion') {
            (new detailController())->detailconnexion($postData);  // strip_tags(htmlspecialchar ?
            exit; // to review
        }

        if ($_GET['owp'] === 'inscription') {
            (new InscriptionController())->inscription();
            exit; // to review
        }
        if ($_GET['owp'] === 'connexion') {
            (new ConnexionController())->connexion();
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
