
<?php session_start();

define('ROOT', dirname(__DIR__));  // in local : "/Users/Tanguy/Documents/sites/blog-omega"

// if cookie or session present
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}

use Application\Controllers\CommentController\CommentController;
use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController\DetailController;
use Application\Controllers\InsscriptionController\InscriptionController;
use Application\Controllers\connexion\ConnexionController;
use Application\Controllers\ErrorController\ErrorController;

// Config
require_once(ROOT . '/app/config/config.php');
// requires
require_once(ROOT . '/app/config/required.php');
//require_once(ROOT . '/app/myAutoloader.php');  // not OK

// autoloader
require_once(ROOT . '/vendor/autoload.php');

/**
 * $identifier is a string... but also integer like "3"
 */

// verification $_POST : strip_tags(htmlspecialchars() + password $hashed
$postData = $_POST;
foreach ($postData as $key => $value) {
    // to use it later...
    if ($key   === 'password') {
        $hashed = crypt($value, 'anythingyouwant_$' . SALT);
        //$value = $hashed;  // reception  $hashed on connect
    }
    $postData[$key]  = strip_tags(htmlspecialchars($value));
}

try {
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        // from page connexion : redirection to comment
        if ($_GET['owp'] === 'detailconnexion') {
            (new DetailController())->detailconnexion($postData);
            exit;
        }
        //signout
        if ($_GET['owp'] === 'se-deconnectez') {
            (new ConnexionController())->signOut();
            exit;
        }
        //inscription : (not create an account just sign in)
        if ($_GET['owp'] === 'inscription') {
            (new InscriptionController())->inscription();
            exit;
        }
        // Connexion
        if ($_GET['owp'] === 'connexion') {
            (new ConnexionController())->connexion();
            exit;
        }
        // setcomment from page detail
        if ($_GET['owp'] === 'faire-un-commentaire') {
            (new CommentController())->SetComment($postData);
            exit;
        }
        // Create an user account
        if ($_GET['owp'] === 'creation-d-un-compte') {
            (new InscriptionController())->CreateAccount($postData);
            exit;
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
        } elseif ($_GET['owp'] === 'creation-d-un-compte') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // $identifier = $_GET['id'];
                // $identifier = strip_tags(htmlspecialchars($identifier));
                // (new InscriptionController())->CreateAccount($postData);

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
    $errorMessage = $e->getMessage(); // string
    require(ROOT . '/app/templatesError/error.php');
    // // to try : 
    // change string in array to use twig
    // $errorMessage = $e->getMessage();
    // (new ErrorController())->execute($errorMessager);
}
