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

    public $message;
    // public $hash;  // conflict with twig ?
    // public function __construct()
    // {
    //     $this->hash = '9DEFF146D808FFF8A263BDFA150C61F003C7B8B';
    // }




    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function Detail($identifier)
    {

        //verify is $identifier is a "string(integer)" if not display a message
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
        $baseUrl = BASE_URL; // used for return button

        if (isset($this->message)) {
        }

        $message = $this->message = "Veuillez entrer votre commentaire si vous êtes connecté puis valider";

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments', 'baseUrl, message'));
    }


    /**
     *  function to get all data which is useful - EXAMPLE  string(10) "tsd@fqd.fr" string(21) "sffqddfdqfqdfdqsffdqs"
     * htmlspecialchars($_COOKIE["name"])
     * time() + 365 * 24 * 3600 : one year
     * time() + 3600 : one hour ?
     *
     * @param [type] $postData
     * @return void
     */
    public function DetailConnexion($postData)
    {
        // if exist
        if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {
            $connection = new DatabaseConnection();
            $UsersRepository = new UsersRepository();
            $UsersRepository->connection = $connection;
            $users = $UsersRepository->getUsers(); // return an array

            // if correspondance email + password ( $_POST and DB )   // todo / see sha 512
            foreach ($users as $user) {
                if ($user['EmailUser'] === $postData['user_login'] && $user['passWordUser'] === $postData['user_pass']) {
                    // setcookie(
                    //     'blogOmegawebProduct',
                    //     $user['firstNameUser'],
                    //     time() + 3600,
                    //     'blog.omegawebproduct.com',
                    //     true,
                    //     true
                    // );
                    // exemple
                    // setcookie("nom", "John Watkin", time() + 3600, "/", "", 0);
                    // setcookie("age", "36", time() + 3600, "/", "",  0);

                    setcookie(
                        'LOGGED_USER',
                        $postData['user_login'],
                        [
                            'expires' => time() + 3600,
                            'secure' => true,
                            'httponly' => true,
                        ]
                    );

                    $this->message = "Bravo vous êtes connecté et pouvez laisser un commentaire";
                    // redirection to the good post
                    $this->Detail($postData['postId']);
                    // $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments', 'baseUrl'));

                    // $currentUser['emailUser'] = $postData['emailUser'];
                    // $_SESSION['LOGGED_USER'] = $currentUser;
                    // } else {
                    //     $errorMessage = sprintf(
                    //             'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    //         );
                    //     }
                }
            }
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
