<?php

namespace Application\Controllers\AdminController;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;

use Application\Controllers\Controller;

use Application\Repositories\UserRepository\UserRepository;

/**
 * class
 */
class AdminController extends Controller
{
    /**
     *  function
     *
     * @return void
     */
    public function ConnectAdmin()
    {
        $message = 'false';
        $this->twig->display('Admin/adminConnexion.html.twig', compact('message'));
    }

    /**
     *  function
     *
     * @param array $postData
     * @param string $message
     * @return void
     */
    public function auth(array $postData, string $message)
    {
        if ($this->myAuth($postData)) {

            $message = "Bienvenue sur l'Admin du blog";

            //var_dump($_SESSION['ROLE_USER']); here Admin

            $Array = ['nothing' => ""];
            $this->BlocPostadmin($Array, $message);
        } else {
            $this->redirectionNotAdmin();
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
    // public function BlocPostadmin(array $postData, string $message)
    public function BlocPostadmin($array, $message)
    {

        $message = $message;
        if ($this->isAdmin()) {
            // get the data to modify all the data of a post and this author (admin)
            $arrayTableModify = $this->getAdminUserAndData();

            // authors id + emails
            $arrayEmails = $this->getAdminEmails();

            if (!isset($message)) {
                $arrayMessage =  $this->setMessageForTwig("false");
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
            $adminUserAndData = new UserRepository();
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
            $adminUserEmails = new UserRepository();
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
