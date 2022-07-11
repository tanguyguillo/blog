<?php
namespace Application\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * make working twig by heritage
 */
abstract class Controller
{
        private $Loader;
        protected $twig;

        public function __construct()
        {
                $this->loader = new FilesystemLoader(ROOT . '/app/templates');

                // env twig
                $this->twig = new Environment($this->loader);

                /* or if we want a cache for twig
                *$this->twig = new \Twig\Environment(loader, [
                        'cache' => ROOT . '/compilation_cache',
                ]);*/
        }
}
