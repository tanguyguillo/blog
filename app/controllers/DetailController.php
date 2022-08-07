<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\DatababaseConnexion;
use Application\Model\UserModel\UsersRepository;
use Application\Model\DetailModel\Detail;
use Application\Model\UserModel\User;
use Application\Model\CommentModel\Comment;
//
use Application\Controllers\Controller;
use Application\Controllers\ConnexionController\ConnexionController;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;

class DetailController extends Controller
{
    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function detail($identifier, $message = '')
    {
        // // for intance when inscription
        if ($identifier === "") {
            //$identifier = $_SESSION['LOGGED_PAGE_ID']; // article id
            $identifier = "3";
        }

        //verify is $identifier is a "string(integer)" if not display a message
        $this->isInteger($identifier);
        if ($this->isInteger($identifier) == false) {
            $message = "l'identifiant de la page doit être un chiffre";
            $this->twig->display('error/error.html.twig', compact('message'));
            exit;
        }

        $connection = new DatabaseConnexion();

        // 1 - Detail
        $identifier = htmlspecialchars($identifier);
        $postDetail = new Detail();
        $postDetail->connection = $connection;

        // test (getMaxAndOpen) to se the user tape by hand on the url 10000 for exemple for the article id
        if ($postDetail->getMaxAndOpen($identifier)) {
            // $detail  :  ["postStatus"] - ["postName"] (not used ) -  ["postModified"] - ["user_id"] (author) etc...
            $detail =  $postDetail->getPost($identifier); // return an array
            $detailForAurhor = json_decode(json_encode($detail), true);
            $AuthorId = $detailForAurhor["user_id"];
        } else {
            $message = "l'identifiant de la page est inexact";
            $this->twig->display('error/error.html.twig', compact('message'));
            exit;
        };

        // 2 - user  
        $connection = new DatabaseConnexion();
        $user = new User();
        $user->connection = $connection;
        $user  = $user->getUser($AuthorId); // return an array

        // 3 - Comment
        $connection = new DatabaseConnexion();
        $postComments = new Comment();
        $postComments->connection = $connection;
        $postComments  = $postComments->getComments($identifier); // return an array
        $postComments = json_decode(json_encode($postComments), true);

        $baseUrl = BASE_URL; // used for return button after connexion
        $_SESSION['LOGGED_PAGE_ID'] = $identifier; // used article read for return button button after connexion

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
    public function detailConnexion(array $postData, string $messsage = '')
    {
        $messsageReadle = ""; // for no data message

        // if exist
        if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {
            $connection = new DatabaseConnexion();
            $usersRepository = new UsersRepository();
            $usersRepository->connection = $connection;
            $users = $usersRepository->getUsers(); // return an array

            // if correspondance email + password + crypt
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

                    $_SESSION['ROLE_USER'] = $user["roleUser"]; // is User or Admin

                    // we return to the page detail with the good id ... ? add block showing unrefesh thing ?
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
     * function to verify crypt password
     *
     * @param [type] $user_input
     * @param [type] $hashed_password
     * @return boll
     */
    private function verifyHashPassword($user_input, $hashed_password)
    {
        if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
            return true;
        } else {
            return false;
        }
    }
}
