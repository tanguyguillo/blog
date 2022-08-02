<?php

namespace Application\Controllers\AdminController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Model\CommentModel\Comment;
use Application\Model\UserModel\User;
use Application\Model\UserModel\UsersRepository;

class AdminController extends Controller
{
    /**
     *  function
     *
     * @return void
     */
    public function ConnectAdmin()
    {
        $message = '';
        $this->twig->display('Admin/adminConnexion.html.twig', compact('message'));
    }

    /**
     * function
     *
     * @return void
     */
    public function BlocPostadmin()
    {
        // get the data to modify
        $arrayTableModify = $this->getAdminUserAndData();
        $message = '';
        $this->twig->display('Admin/blocPostAdmin.html.twig', compact('message', 'arrayTableModify'));
    }

    /**
     * function to get data to fill the table to modify in admin aera
     *
     * @return an Array or display error
     */
    public function getAdminUserAndData()
    {
        $connection = new DatabaseConnexion();
        $adminUserAndData = new UsersRepository();
        $adminUserAndData->connection = $connection;
        $adminUserAndData = $adminUserAndData->getPostAndUser();
        $adminUserAndData = json_decode(json_encode($adminUserAndData), true);

        // var_dump($adminUserAndData);
        // exit;

        if (is_array($adminUserAndData)) {
            return $adminUserAndData;
        } else {
            $message = "Il y a eu un problème avec la transmission des données, vueillez reéssayer plus tard";
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }
}
