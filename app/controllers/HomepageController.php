<?php

namespace Application\Controllers\HomepageController;

use Application\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * For now juste a static page with twig
     *
     * @return void
     */
    public function execute()
    {
        //// test heritage
        // $nbr = parent::$nbr + 1; // public static $nbr = 10;  we get this number from class Controller
        // var_dump($nbr); // 11

        //// withe the method : string(6) "yessss" : it's working
        // $myTest = $this->myTest();
        // var_dump($myTest);

        $this->twig->display('homepage/homepage.html.twig');
    }
}
