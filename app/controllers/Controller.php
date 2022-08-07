<?php

declare(strict_types=1);

namespace Application\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * make working twig by heritage
 */
abstract class Controller
{
    protected $twig;

    public static $nbr = 10;

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
}
