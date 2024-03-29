<?php

namespace Application\Controllers;

use Application\Core\Auth\Auth;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

/**
 * make working twig by heritage
 */
abstract class Controller extends Auth
{
    protected $twig;

    /**
     * main controller
     * integration twig
     */
    public function __construct()
    {
        $debugTwig = TWIGDEBUG;
        $this->loader = new FilesystemLoader(ROOT . '/app/views');
        $this->twig = new Environment(
            $this->loader,
            [
                'debug' => $debugTwig
            ]
        );
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('session', $_SESSION);
    }

    /**
     * function to make message readeableby twig
     *
     * @param  string $message
     * @return Array
     */
    public function setMessageForTwig(string $message)
    {
        $messageReadle = $message;
        $arrayMessage = array(
            "message" => $messageReadle
        );
        return $arrayMessage;
    }

    /**
     * function to void session
     *
     * @return void
     */
    public function initSession()
    {
        $_SESSION = array();
        unset($_SESSION['LOGGED_USER']);
        unset($_SESSION['LOGGED_USER_NAME']);
        unset($_SESSION['LOGGED_USER_ID']);
        unset($_SESSION);
        session_destroy();
    }

    /**
     *  function to verify that the user is logged
     * $message = "You have o be connected to comment a post";
     *
     * @return void
     */
    public function verifyComment($message)
    {
        if (($_SESSION['LOGGED_USER_NAME'] == "")) {
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }
    /**************
     * Utilities From here ********************
     */

    /**
     * to verify user is an admin   
     * 
     * @return bool
     */
    public function isAdmin()
    {
        if (isset($_SESSION['ROLE_USER'])) {
            if ($_SESSION['ROLE_USER'] == "Admin") {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * function return true if number otherwise false
     *
     * @param  [string] $identifier
     * @return bool
     */
    public function isInteger(string $identifier)
    {
        $identifier = filter_var($identifier, FILTER_VALIDATE_INT);
        return ($identifier !== false);
    }

    /**
     * function to redirect user who are not admin
     *
     * @return void
     */
    public function redirectionNotAdmin()
    {
        $message = 'Désolé cette partie du site est réservé aux administrateurs';
        $this->twig->display('info/info.html.twig', compact('message'));
    }

    /**
     * function to make a string reable by twig
     *
     * @param  string $message
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
     * @param  [type] $user_input
     * @param  [type] $hashed_password
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

    /**
     * function to verif $identifier
     *
     * @param  [type] $identifier
     * @return int
     */
    public function checkIdentifier($identifier)
    {
        $identifier = htmlspecialchars($identifier);

        $identifier = (int)$identifier;
        if ($identifier === "") {
            $identifier = "3";
            $identifier = $_SESSION['LOGGED_PAGE_ID'];
        }
        return $identifier;

        $this->isInteger($identifier);
        if ($this->isInteger($identifier) === false) {
            $message = "l'identifiant de la page doit être un chiffre";
            $this->twig->display('error/error.html.twig', compact('message'));
        }
        return  $identifier;
    }
}
