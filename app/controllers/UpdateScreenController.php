<?php

namespace Application\Controllers\UpdateScreenController;

use Application\Controllers\Controller;
use Application\Controllers\PostsController\PostsController;

class UpdateScreenController extends Controller
{
    /**
     * to refresh the screen infos
     */
    public function refreshScreen($render)
    {
        (new PostsController())->executePosts("render");
    }
}
