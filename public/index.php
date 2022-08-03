
<?php session_start();

define('ROOT', dirname(__DIR__));

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
use Application\Controllers\InscriptionController\InscriptionController;
use Application\Controllers\ErrorController\ErrorController;
use Application\Controllers\AdminController\AdminController;
use Application\Controllers\ConnexionController\ConnexionController;

// Config
require_once(ROOT . '/app/config/config.php');

// autoloader
require_once(ROOT . '/vendor/autoload.php');

// builf my own autoloader  :
require_once(ROOT . '/app/myAutoloader.php');

var_dump($_POST);

// check $_POST : strip_tags(htmlspecialchars()
$postData = $_POST;

foreach ($postData as $key => $value) {
    $postData[$key]  = strip_tags(htmlspecialchars($value));
}

// first router
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
        // Admin aera
        if ($_GET['owp'] === 'administration') {
            (new AdminController())->ConnectAdmin();
            exit;
        }
        if ($_GET['owp'] === 'blocPostAdmin') {
            (new AdminController())->BlocPostadmin();
            exit;
        }
    }

    // admin router
    if ($_GET['owp'] === 'record') {
        // if (isset($_GET['id']) && $_GET['id'] > 0) {
        $identifier = $_POST['postId'];
        $identifier = strip_tags(htmlspecialchars($identifier));
        echo "yep";
        exit;
        // }
    }

    // Last router
    if (isset($_GET['owp']) && $_GET['owp'] !== '') {
        if ($_GET['owp'] === 'bloglist') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $identifier = strip_tags(htmlspecialchars($identifier));
                (new DetailController())->Detail($identifier);
            } else {
                (new PostsController())->executePosts();
            }
        } elseif ($_GET['owp'] === 'tosee') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // $identifier = $_GET['id'];
                // $identifier = strip_tags(htmlspecialchars($identifier));
                // echo "yep";
                // exit;
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
    // $errorMessage = $e->getMessage(); // string
    // require(ROOT . '/app/templatesError/error.php');
    // // to try : 
    // change string in array to use twig
    $errorMessage = $e->getMessage();
    (new ErrorController())->execute($errorMessage);
}
