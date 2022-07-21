<?php

declare(strict_types=1);

namespace Application\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Application\Core\Database\Database\DatabaseConnection;

/**
 * make working twig by heritage
 */
abstract class Controller
{
    private $Loader;
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
     * Undocumented function not used yet
     *
     * @param array $array
     * @return void
     */
    public function deletePostsIfNotValid(array $array)
    {
    }

    /**
     * function return true if number false otherwise
     *
     * @param [type] $identifier
     * @return boll
     */
    public function isInteger($identifier)
    {
        if ($this->isInteger($identifier) == false) {
            $message = "l'identifiant de la page doit être un chiffre";
            $this->twig->display('error/error.html.twig', compact('message'));
            exit;
        }
        return true;
    }

    /**
     * 
     */
    public function disconnect()
    {
        if ($_SESSION['LOGGED_USER'] == true) {
            session_destroy();
            $_SESSION['LOGGED_USER'] = false; // for twig view
            // var_dump('yes');
            exit;
        }
    }
}
