<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Controllers\Controller;
use Application\Model\DetailModel\Detail;
use Application\Model\UserModel\User;
use Application\Model\CommentModel\Comment;
use Application\Model\UserModel\UsersRepository;

class DetailController extends Controller
{
    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function Detail($identifier)
    {
        /**
         * verify is $identifier is a "string(integer)" if not display a message
         */
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

        //$max = $postDetail->getMaxAndOpen(); // todo later

        $detail =   $postDetail->getPost($identifier); // return an array
        // turn in Array
        $detail = json_decode(json_encode($detail), true);

        //$blog_post_id = $detail['blog_post_id']; // here the id of the post : blog_post_id

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
        $baseUrl = BASE_URL;

        //array(1) { [0]=> array(5) { ["commentStatus"]=> string(4) "Open" ["commentContent"]=> string(11) "bla bla bla" ["blog_post_id"]=> string(1) "1" ["user_id"]=> string(1) "1" ["id"]=> string(1) "1" } }
        ////*  use deletePostsIfNotValid($array) from Controller to delete post not valid for instance it use twig

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments', 'baseUrl'));
    }


    /**
     * Undocumented function
     *
     * @param [type] $postData
     * @return void
     */
    public function DetailConnexion($postData)
    {
        // EXAMPLE array(2)array(2) { ["user_login"]=> string(23) "tanguy.guillo@gmail.com" ["user_pass"]=> string(18) "lepetitchatestbeau" }
        if (isset($postData['user_login']) &&  isset($postData['user_login'])) {

            var_dump($postData['user_login']); // here an email address
            var_dump($postData['user_pass']);


            $connection = new DatabaseConnection();
            $UsersRepository = new UsersRepository();
            $UsersRepository->connection = $connection;
            $users = $UsersRepository->getUsers();  // issue...

            //var_export($users);















            // $connection = new DatabaseConnection(); // from models

            // //then we will use this connexion to get what we want ; here posts
            // $postsRepository = new PostsRepository();
            // $postsRepository->connection = $connection;
            // $posts = $postsRepository->getPosts(); // return an array


            //     foreach ($users as $user) {
            //         if (
            //             $user['email'] === $postData['email'] &&
            //             $user['password'] === $postData['password']
            //         ) {
            //             $loggedUser = [
            //                 'email' => $user['email'],
            //             ];

            //             /**
            //              * Cookie qui expire dans un an
            //              */
            //             setcookie(
            //                 'LOGGED_USER',
            //                 $loggedUser['email'],
            //                 [
            //                     'expires' => time() + 365*24*3600,
            //                     'secure' => true,
            //                     'httponly' => true,
            //                 ]
            //             );

            //             $_SESSION['LOGGED_USER'] = $loggedUser['email'];
            //         } else {
            //             $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
            //                 $postData['email'],
            //                 $postData['password']
            //             );
            //         }
        }
    }



    /**
     * function return true if number false otherwise
     *
     * @param [type] $identifier
     * @return bool
     */
    public function isInteger($identifier)
    {
        $identifier = filter_var($identifier, FILTER_VALIDATE_INT);
        return ($identifier !== FALSE);
    }
}
