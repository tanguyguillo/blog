<?php

namespace Application\Controllers\AdminController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Model\UserModel\UsersRepository;
// use Application\model\PostModel\PostsRepository;
// use Application\Controllers\PostsController;

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
     * to verify user is an admin   
     */
    public function isAdmin()
    {
        if (isset($_SESSION['ROLE_USER'])) {
            if ($_SESSION['ROLE_USER'] == "Admin") {
                return true;
            } else {
                return false;
            }
            return false;
        }
    }

    /**
     * function to redirect user who are not admin
     *
     * @return void
     */
    public function redirectionNotAdmin()
    {
        $message = 'Désolé cette partie du site est réservé aux administrateurs';
        $this->twig->display('info/info.html.twig', compact('message'));
    }

    /**
     * function to display admin modify aera posts
     *
     * @return void
     */
    public function BlocPostadmin(string $message)
    {
        if ($this->isAdmin()) {
            // get the data to modify all the data of a post and this author (admin)
            $arrayTableModify = $this->getAdminUserAndData();

            // authors id + emails
            $arrayEmails = $this->getAdminEmails();

            if (!isset($message)) {
                $message = "";
            } else {
                $arrayMessage =  $this->setMessageForTwig($message); // setMessageForTwig : heritage from Controller
            }


            $this->twig->display('Admin/blocPostAdmin.html.twig', compact('arrayMessage', 'arrayTableModify', 'arrayEmails'));
        } else {
            $this->redirectionNotAdmin();
        }
    }

    /**
     * function to get data to fill the table to modify in admin aera
     * 
     *
     * @return an Array or display error
     */
    public function getAdminUserAndData()
    {
        if ($this->isAdmin()) {
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
        } else {
            $this->redirectionNotAdmin();
        }
    }

    /**
     * function to get the user's Email (for popup)
     * 
     * string $role ( Admin or User )
     *
     * @return array
     */
    public function getAdminEmails()
    {
        if ($this->isAdmin()) {
            $connection = new DatabaseConnexion();
            $adminUserEmails = new UsersRepository();
            $adminUserEmails->connection = $connection;
            $adminUserEmails = $adminUserEmails->getEmailUser('Admin');

            if (is_array($adminUserEmails)) {
                return  $adminUserEmails;
            } else {
                $message = "Il y a eu un problème avec la transmission des données, vueillez reessayer plus tard...";
                $this->twig->display('info/info.html.twig', compact('message'));
            }
        } else {
            $this->redirectionNotAdmin();
        }
    }
}
