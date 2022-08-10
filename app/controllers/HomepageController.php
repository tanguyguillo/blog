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
        $this->twig->display('homepage/homepage.html.twig');
    }
}
