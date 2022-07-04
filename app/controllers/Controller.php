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

        /* or if we want a cache for twig
                *$this->twig = new \Twig\Environment(loader, [
                        'cache' => ROOT . '/compilation_cache',
                ]);*/
    }

    /**
     * 
     */
    /*  public function getClassList
        [
            $path = __DIR__;
            $fqcns = array();

            $allFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
            $phpFiles = new RegexIterator($allFiles, '/\.php$/');
            foreach ($phpFiles as $phpFile) {
                $content = file_get_contents($phpFile->getRealPath());
                $tokens = token_get_all($content);
                $namespace = '';
                for ($index = 0; isset($tokens[$index]); $index++) {
                    if (!isset($tokens[$index][0])) {
                        continue;
                    }
                    if (T_NAMESPACE === $tokens[$index][0]) {
                        $index += 2; //Skip namespace keyword and whitespace
                        while (isset($tokens[$index]) && is_array($tokens[$index])) {
                            $namespace .= $tokens[$index++][1];
                        }
                    }
                    if (T_CLASS === $tokens[$index][0] && T_WHITESPACE === $tokens[$index + 1][0] && T_STRING === $tokens[$index + 2][0]) {
                        $index += 2; //Skip class keyword and whitespace
                        $fqcns[] = $namespace.'\\'.$tokens[$index][1];

                        # break if you have one class per file (psr-4 compliant)
                        # otherwise you'll need to handle class constants (Foo::class)
                        break;
                    }
                }
            }

            var_dump($fqcns);

        ]*/
}
