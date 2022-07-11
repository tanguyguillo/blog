<?php
namespace Application\Controllers\HomepageController;

use Application\Controllers\Controller;

require_once(ROOT . '/app/controllers/controller.php'); //

class HomepageController extends Controller
{
    public function execute()
    {   
        $this->twig->display('homepage/homepage.html.twig');
    }
}
