<?php

namespace Application\Controllers\DetailController;

use Application\Controllers\Controller;

require_once(ROOT . '/app/controllers/controller.php'); //


class DetailController extends Controller
{
    /**
     * Function to show one blog post
     *
     * @param integer $identifier
     * @return void
     */
    public function executeDetail($identifier)
    {
        $this->twig->display('homepage/homepage.html.twig');
    }
}
