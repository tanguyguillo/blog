<?php

namespace Application\Controllers\AdminController;

use Application\Controllers\Controller;

use Application\Core\Database\\DatabaseConnection;
use Application\Model\CommentModel\Comment;



class AdminController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function ConnectAdmin()
    {
        $message = '';
        $this->twig->display('Admin/adminConnexion.html.twig', compact('message'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function BlocPostadmin()
    {
        $message = '';
        $this->twig->display('Admin/blocPostAdmin.html.twig', compact('message'));
    }
}
