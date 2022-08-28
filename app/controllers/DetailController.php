<?php

namespace Application\Controllers\DetailController;

use Application\Controllers\Controller;
use Application\Controllers\ConnexionController\ConnexionController;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\CommentRepository\CommentRepository;
use Application\Repositories\DetailRepository\DetailRepository as DetailRepository;
use Application\Repositories\UserRepository\UserRepository as UserRepositoryUserRepository;

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
        /**
         * to check the user's enter for exemple 10 0000 which don't exist (yet)
         */
        $identifier = $this->checkIdentifier($identifier);

        /**
         * /1 - Detail
         */
        $connection = new DatabaseConnexion();
        $postDetail = new DetailRepository();
        $postDetail->connection = $connection;

        /**
         * Test (getMaxAndOpen : return true/false to see the user tape by hand on the url 10000 for exemple for the article id
         */
        if ($postDetail->getMaxAndOpen($identifier)) {
            /**
             * return an objet Post // $identifier is the identifier of the post
             */
            $detail =  $postDetail->getPost($identifier);
            $AuthorId = $detail->getUserId();
        } else {
            $message = "l'identifiant de la page est inexact";
            $this->twig->display('error/error.html.twig', compact('message'));
        };


        $connection = new DatabaseConnexion();
        $user = new UserRepositoryUserRepository();
        $user->connection = $connection;
        $user  = $user->getUser($AuthorId);


        $connection = new DatabaseConnexion();
        $postComments = new CommentRepository();
        $postComments->connection = $connection;
        $postComments  = $postComments->getComments($identifier);

        $this->infoNavDetail($identifier, $user);
        $baseUrl = BASE_URL;

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
        $messsageReadle = "";

        if ($this->myAuth($postData)) {
            $message = $_SESSION['LOGGED_USER_NAME'];
            $this->Detail($postData['postId'], $message);
            return true;
        }

        if ($messsageReadle != 'false') {
            $message = 'Désolé, les données de connection sont incorrectes';
            (new ConnexionController())->connexion($message)();
            return false;
        }
    }
}
