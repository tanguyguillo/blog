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
        //$this->twig = new Environment($this->loader);  // prod
        $this->twig = new Environment(
            $this->loader,
            [
                'debug' => true
            ]
        );

        $this->twig->addGlobal('session', $_SESSION);
    }

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
}
