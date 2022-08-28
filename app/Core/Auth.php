<?php

namespace Application\Core\Auth;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\UserRepository\UserRepository;

class Auth extends DatabaseConnexion
{
    /**
     * variable Role
     *
     * @var string
     */
    private $userRole;

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
     * function myAuth ... in some case issue in admin "utilisateur" board not show....
     *  to the beginning  : //$this->InitSession(); sup
     * 
     * return boll
     *
     */
    public function myAuth(array $postData)
    {
        if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {

            $connection = new DatabaseConnexion();
            $usersRepository = new UserRepository();
            $usersRepository->connection = $connection;
            $users = $usersRepository->getUsers(); // return an array

            /**
             * if correspondance email + password + crypt
             */
            foreach ($users as $user) {


                /**
                 * verified data form == data db (email and password)
                 */
                if (($user['emailUser'] === $postData['user_login']) && ($user['passWordUser']  === crypt($postData['user_pass'], SALT))) {

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

                    $_SESSION['ROLE_USER'] = $user["roleUser"];

                    $this->setuserRole($user["roleUser"]);

                    return true;
                }
            }
            return false;
        }
    }

    /**
     * function infoNavDetail ... like his name
     *
     * @param [string] $identifier
     * @return void
     */
    public function infoNavDetail($identifier, $user)
    {
        $_SESSION['LOGGED_PAGE_ID'] = $identifier; // used article read for return button button after connexion
        $_SESSION['LOGGED_PAGE_WRITER_ID'] = $user->getId();
    }

    /**
     * function heriatgae Controlleur-initSession
     *
     * @return void
     */
    public function initSession()
    {
        $this->initSession();
    }
}
