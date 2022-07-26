<?php

namespace Application\Controllers\AdminController;

use Application\Controllers\Controller;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\CommentModel\Comment;



class AdminController extends Controller
{
    public function ConnectAdmin()
    {
        $message = 'totp';
        $this->twig->display('Admin/admin.html.twig', compact('message'));
    }
}
