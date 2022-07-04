<?php

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
     * 
     */
    public function __construct()
    {
        // Connexion to the dataBase... to see later
        //$connection = new DatabaseConnection();

        // where the twig views
        $this->loader = new FilesystemLoader(ROOT . '/app/views');

        // env twig
        $this->twig = new Environment($this->loader);
    }
}
