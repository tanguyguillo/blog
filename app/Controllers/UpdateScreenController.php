<?php

namespace Application\Controllers\UpdateScreenController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\PostsRepository\PostsRepository as PostsRepository;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\HomepageController\HomepageController;

class UpdateScreenController extends Controller
{
    /**
     * to refresh the screen infos
     */
    public function refreshScreen()
    {
        (new HomepageController())->execute();
    }
}
