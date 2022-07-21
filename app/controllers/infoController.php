<?php

namespace Application\Controllers\InfoController;

use Application\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * information
     *
     * @param [string] $message
     * @return void
     */
    public function execute(string $errorMessage)
    {
        $this->twig->display(
            'info/info.html.twig',
            [
                'message' => $errorMessage
            ]
        );
    }
}
