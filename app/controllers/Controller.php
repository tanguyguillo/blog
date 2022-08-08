<?php

declare(strict_types=1);

namespace Application\Controllers;

use Application\Core\Auth\Auth;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * make working twig by heritage
 */
abstract class Controller extends Auth
{
    protected $twig;

    /**
     * main controller
     * integration twig
     * 
     */
    public function __construct()
    {
        // where the twig views
        $this->loader = new FilesystemLoader(ROOT . '/app/Views');
        // env twig
        // put true for debug // prod
        $this->twig = new Environment(
            $this->loader,
            [
                'debug' => false
            ]
        );
        $this->twig->addGlobal('session', $_SESSION);
    }

    /**
     * function to make message readeableby twig
     *
     * @param string $message
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
    public function InitSession()
    {
        $_SESSION = array();
        unset($_SESSION['LOGGED_USER']);
        unset($_SESSION['LOGGED_USER_NAME']);
        unset($_SESSION['LOGGED_USER_ID']);
        unset($_SESSION);
        session_destroy();
    }

    /************** Utilities From here ********************
     *
     * 
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
            return false;
        }
    }

    /**
     * function return true if number otherwise false
     *
     * @param [string] $identifier
     * @return bool
     */
    public function isInteger(string $identifier)
    {
        $identifier = filter_var($identifier, FILTER_VALIDATE_INT);
        return ($identifier !== FALSE);
    }
}
