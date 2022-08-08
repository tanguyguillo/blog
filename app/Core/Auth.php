<?php

namespace Application\Core\Auth;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Model\UserModel\UsersRepository;

class Auth
{
    /**
     * variable Role
     *
     * @var string
     */
    private $userRole;

    /**
     * function
     */
    public function __construct()
    {
    }


    /**
     *  function setuserRole
     *
     * @param [type] $userRole// in french : mutateur
     * @return void
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     *  function getuserRole // in french : accesseur
     *
     * @param [type] $userRole
     * @return $this->user
     */
    public function getuserRole($userRole)
    {
        return $this->userRole;
    }

    /**
     * function myAuth
     * 
     * return boll
     *
     */
    public function myAuth(array $postData)
    {
        $this->InitSession();

        if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {

            $connection = new DatabaseConnexion();
            $usersRepository = new UsersRepository();
            $usersRepository->connection = $connection;
            $users = $usersRepository->getUsers(); // return an array

            // var_dump($users);  Ok

            // if correspondance email + password + crypt
            foreach ($users as $user) {

                // verified data form == data db (email and password)
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

                    $_SESSION['LOGGED_USER'] =  true;
                    $_SESSION['LOGGED_USER_ID'] = $user['id'];

                    $_SESSION['LOGGED_EMAIL'] = $postData['user_login'];
                    $_SESSION['LOGGED_PAGE_ID'] = $postData['postId'];

                    $message = $user["firstNameUser"];
                    $_SESSION['LOGGED_USER_NAME'] =  $message;

                    $_SESSION['ROLE_USER'] = $user["roleUser"]; // is User or Admin

                    $this->setuserRole($user["roleUser"]);

                    // add for admin menu
                    // if ($this->userRole = "Admin") {
                    //     $_SESSION['ROLE_USER']
                    // }

                    return true;
                }
            }
            return false;
        }
    }

    /**
     * function heriatgae Controlleur-InitSession
     *
     * @return void
     */
    public function InitSession()
    {
        $this->InitSession();
    }
}
