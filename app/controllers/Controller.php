<?php

namespace Application\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * abstarit class : instantation by "heritage"
 * ///Users/Tanguy/Documents/sites/blog-omega/app/models/postsModel.php'
 * 
 * Uncaught Error: Class "Twig\Loader\FilesystemLoader" not found in /Users/Tanguy/Documents/sites/blog-omega/app/controllers/controller.php:
 */
abstract class Controller
{
        private $Loader;
        protected $twig;

        public function __construct()
        {


                /**$loader = new \Twig\Loader\FilesystemLoader(ROOT.'/app/templates');
                $twig = new \Twig\Environment($loader);
                var_dump(ROOT.'/app/templates');*/

                //require_once(ROOT . '/vendor/autoload.php');

                $this->loader = new FilesystemLoader(ROOT.'/app/templates');
                
                // env twig
                $this->twig = new Environment($this->loader);


                /*$this->twig = new \Twig\Environment(loader, [
                        'cache' => ROOT . '/compilation_cache',
                ]);*/

                /**$path = ('/posts/posts.html.twig');
                $template = $twig->load('posts/posts.html.twig'); 
                var_dump( $template);*/
        }

        /***
         *   to see
         * 
        public static function renderTemplate($template, $args = [])
        {
                static $twig = null;

                if ($twig === null) {
                        $loader = new \Twig\Loader\FilesystemLoader(ROOT . '/app/templates');
                        $twig = new \Twig\Environment($loader);
                }
                //echo $twig->render($template, $args); // this is the point of my code when the error occurs
        }*/
}
