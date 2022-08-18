<?php

namespace Application\Controllers\DetailController;

use Application\Controllers\Controller;
use Application\Controllers\ConnexionController\ConnexionController;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\CommentRepository\CommentRepository;
use Application\Repositories\DetailRepository\DetailRepository as DetailRepository;
use Application\Repositories\UserRepository\UserRepository;

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
        $postDetail = new DetailRepository();
        $postDetail->connection = $connection;

        // test (getMaxAndOpen) to se the user tape by hand on the url 10000 for exemple for the article id
        if ($postDetail->getMaxAndOpen($identifier)) {
            // old method
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
        $user = new UserRepository();
        $user->connection = $connection;
        $user  = $user->getUser($AuthorId); // return an array


        // hydratation and objet / entities
        $o = 0;
        if ($o) {
            $user0 = new UserRepository();
            $user0->connection = $connection;;
            $userO  = $user0->getUsersO($AuthorId); // return an array
            $Email =  $userO->getEmailUser();
            var_dump($Email);
            exit;
        }


        // $user2 = UserModel->getFirstNameUser;
        // var_dump($user2);

        // $article = $this->post->findOne($articleId);
        // $commentaires = $this->comment->findAll($articleId);

        // $user2 = UserModel->getfirname();


        // 3 - Comment
        $connection = new DatabaseConnexion();
        $postComments = new CommentRepository();
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
     * @return boll
     */
    public function detailConnexion(array $postData, string $messsage = '')
    {
        $messsageReadle = ""; // for no data message

        if ($this->myAuth($postData)) {
            $message = $_SESSION['LOGGED_USER_NAME'];
            $this->Detail($postData['postId'], $message);
            return true;
        }

        // to avoid a bug because the url can to not change
        if ($messsageReadle != 'false') {
            $message = 'Désolé, les données de connection sont incorrectes';
            // we go bach to connexion page
            (new ConnexionController())->connexion($message)();
            return false;
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
