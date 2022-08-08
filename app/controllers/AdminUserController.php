<?php

namespace Application\Controllers\AdminUserController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Model\UserModel\UsersRepository;
use Application\Core\Auth;

class AdminUserController extends Controller
{


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
     * function to display admin comment aera
     *
     * @return void
     */
    public function blocUserAdmin()
    {
        if ($this->isAdmin()) {
            // get the data to modify all the data of a post and this author (admin)
            //$arrayTableModify = $this->getAdminUserAndData();

            // authors id + emails
            // $arrayEmails = $this->getAdminEmails();

            // if (!isset($message)) {
            //     $message = "";
            // } else {
            //     $arrayMessage =  $this->setMessageForTwig($message); // setMessageForTwig : heritage from Controller
            // }


            $arrayMessage =  $this->setMessageForTwig("false");

            $this->twig->display('Admin/blocUserAdmin.html.twig', compact('arrayMessage'));
        } else {
            $this->redirectionNotAdmin();
        }
    }
}
