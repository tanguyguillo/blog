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
     * main controller
     * integration twig
     * 
     */
    public function __construct()
    {
        // Connexion to the dataBase... to see later
        $connection = new DatabaseConnection();

        // where the twig views
        $this->loader = new FilesystemLoader(ROOT . '/app/Views');

        // env twig
        $this->twig = new Environment($this->loader);

        $this->mAutoload();
    }

    public function deletePostsIfNotValid(array $array)
    {
    }
    /**
     * Undocumented function autoloader for models  // m for my
     *
     * @return void
     */
    private function mAutoload()
    {
        // spl_autoload_extensions('.php');
        // spl_autoload_register();

        require_once(ROOT . '/app/models/DetailModel.php');
        require_once(ROOT . '/app/models/UserModel.php');
        require_once(ROOT . '/app/models/CommentModel.php');
    }
}
