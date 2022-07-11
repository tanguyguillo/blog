<?php

namespace Application\Controllers\ErrorController;

use Application\Controllers\Controller;

class ErrorController extends Controller
{

    /**
     * error page
     *
     * @param [string] $errorMessager
     * @return void
     */
    public function execute($errorMessager)
    {
        $this->twig->display(
            'error/error.html.twig',
            [
                'message' => $errorMessager
            ]
        );
    }
}
