<?php

namespace Application\Controllers\AdminController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
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
     * function to display admin modify aera posts
     *
     * @return void
     */
    public function BlocPostadmin()
    {
        // get the data to modify
        $arrayTableModify = $this->getAdminUserAndData();
        // authors
        $arrayEmail = $this->getAdminEmail(); // bug
        var_dump($arrayEmail);

        $message = '';
        $this->twig->display('Admin/blocPostAdmin.html.twig', compact('message', 'arrayTableModify'));
    }

    /**
     * function to get data to fill the table to modify in admin aera
     * 
     *
     * @return an Array or display error
     */
    public function getAdminUserAndData()
    {
        $connection = new DatabaseConnexion();
        $adminUserAndData = new UsersRepository();
        $adminUserAndData->connection = $connection;
        $adminUserAndData = $adminUserAndData->getPostAndUser();

        if (is_array($adminUserAndData)) {
            return $adminUserAndData;
        } else {
            $message = "Il y a eu un problème avec la transmission des données, vueillez reéssayer plus tard";
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }

    /**
     * function to get the user's Emal
     * 
     * string $role Admin or User
     *
     * @return array
     */
    public function getAdminEmail()
    {
        $connection = new DatabaseConnexion();
        $adminUserEmail = new UsersRepository();
        $adminUserEmail->connection = $connection;
        $adminUserEmail = $adminUserEmail->getEmailUser('Admin');

        if (is_array($adminUserEmail)) {
            return  $adminUserEmail;
        } else {
            $message = "Il y a eu un problème avec la transmission des données, vueillez reéssayer plus tard";
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }
}
