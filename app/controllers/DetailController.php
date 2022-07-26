<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\UserModel\UsersRepository;
use Application\Model\DetailModel\Detail;
use Application\Model\UserModel\User;
use Application\Model\CommentModel\Comment;
//
use Application\Controllers\Controller;
use Application\Controllers\ErrorController\ErrorController;
use Application\Controllers\connexion\ConnexionController;

class DetailController extends Controller
{
    // public $test; // string

    // public function __construct()
    // {
    //     $this->test = 22;
    // }

    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function Detail($identifier, $message = '')
    {
        //verify is $identifier is a "string(integer)" if not display a message
        $this->isInteger($identifier);
        if ($this->isInteger($identifier) == false) {
            $message = "l'identifiant de la page doit être un chiffre";
            $this->twig->display('error/error.html.twig', compact('message'));
            exit;
        }
        // verification .... to see   
        //$this->isInteger($identifier); // if not redirection on error page

        $connection = new DatabaseConnection();

        // 1 - Detail
        $identifier = htmlspecialchars($identifier);
        $postDetail = new Detail();
        $postDetail->connection = $connection;

        // test (getMaxAndOpen) to se the user tape by hand on the url 10000 for exemple for the article id
        if ($postDetail->getMaxAndOpen($identifier)) {
            $detail =  $postDetail->getPost($identifier); // return an array
        } else {
            $message = "l'identifiant de la page est inexact";
            $this->twig->display('error/error.html.twig', compact('message'));
            exit;
        };

        // 2 - user
        $connection = new DatabaseConnection();
        $user = new User();
        $user->connection = $connection;
        $user  = $user->getUser($identifier); // return an array

        // 3 - Comment
        $connection = new DatabaseConnection();
        $postComments = new Comment();
        $postComments->connection = $connection;
        $postComments  = $postComments->getComments($identifier); // return an array
        $postComments = json_decode(json_encode($postComments), true);

        $baseUrl = BASE_URL; // used for return button after connexion
        $_SESSION['LOGGED_PAGE_ID'] = $identifier; // used for return button button after connexion

        $arrayMessage = $this->readleByTwig($message);

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments', 'baseUrl', 'identifier', 'arrayMessage'));
    }

    /**
     *  function to get all data which is useful - EXAMPLE  string(10) "tsd@fqd.fr" string(21) "sffqddfdqfqdfdqsffdqs"
     * htmlspecialchars($_COOKIE["name"])
     * time() + 365 * 24 * 3600 : one year
     * time() + 3600 : one hour ?
     *
     * @param [array] $postData
     * @param [string] $messsage
     * @return void
     */
    public function DetailConnexion(array $postData, string $messsage = '')
    {
        // if exist
        if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {
            $messsageReadle = ""; // for no data message

            $connection = new DatabaseConnection();
            $UsersRepository = new UsersRepository();
            $UsersRepository->connection = $connection;
            $users = $UsersRepository->getUsers(); // return an array

            // if correspondance email + password ( $_POST and DB )   // todo / see sha 512   crypt($value, 'anythingyouwant_$' . SALT);
            foreach ($users as $user) {

                if (($user['emailUser'] === $postData['user_login']) && ($user['passWordUser']  === crypt($postData['user_pass'], SALT))) {
                    // for preferences only
                    setcookie(
                        'LOGGED_USER',
                        $postData['user_login'],
                        [
                            'expires' => time() + 3600,
                            'secure' => true,
                            'httponly' => true,
                        ]
                    );

                    // to avoi a bug because the url can to not change
                    //$messsageReadle = $messsage;
                    $messsageReadle = 'abort';

                    $_SESSION['LOGGED_USER'] =  true;
                    $_SESSION['LOGGED_USER_ID'] = $user['id'];

                    $_SESSION['LOGGED_EMAIL'] = $postData['user_login'];
                    $_SESSION['LOGGED_PAGE_ID'] = $postData['postId'];

                    $message = $user["firstNameUser"];
                    $_SESSION['LOGGED_USER_NAME'] =  $message;

                    // we return to the page detail with the good id 
                    $this->Detail($postData['postId'], $message);
                }
            }
        }
        // to avoid a bug because the url can to not change
        if ($messsageReadle != 'abort') {
            $message = 'Désolé, les données de connection sont incorrectes';
            // we go bach to connexion page
            (new ConnexionController())->connexion($message)();
        }
    }

    /**
     * function to make a string reable by twig
     *
     * @param string $message
     * @return array
     */
    public function readleByTwig(string $message)
    {
        // to make readeableby twig
        $messageReadle = $message;
        $arrayMessage = array(
            "message" => $messageReadle
        );
        return $arrayMessage;
    }

    /**
     * function return true if number otherwise false
     *
     * @param [string] $identifier
     * @return bool
     */
    public function isInteger($identifier): string
    {
        $identifier = filter_var($identifier, FILTER_VALIDATE_INT);
        return ($identifier !== FALSE);
    }

    /**
     * Undocumented function
     *
     * @param [type] $user_input
     * @param [type] $hashed_password
     * @return boll
     */
    private function verifyHashPassword($user_input, $hashed_password)
    {
        if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
            var_dump("Password verified! and ok");
            return true;
        } else {
            return false;
        }
    }
    /**
     * function info
     *
     * @param Array
     * @return void
     */
    // private function makeCryptPassword( $user['passWordUser'], $postData['user_pass'])
    // {
    //     var_dump("user['passWordUser'] :" . $user['passWordUser']);
    //     if (($user['passWordUser']) === (crypt($postData['user_pass'], SALT))) {
    //         var_dump("trouvé" . ($postData["user_login"]));
    //         $cypt = crypt($postData['user_pass'], SALT);
    //         var_dump($cypt);
    //         exit;
    //     } else {
    //         var_dump('pas trouvé  :    ' . ($postData["user_login"]));
    //         $cypt = crypt($postData['user_pass'], SALT);
    //         var_dump($cypt);
    //         exit;
    //     }
    // }
}
