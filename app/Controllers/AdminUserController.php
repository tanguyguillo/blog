<?php

namespace Application\Controllers\AdminUserController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\UserRepository\UserRepository;


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
     * function to display admin user aera
     *
     * @return void
     */
    public function blocUserAdmin($message = "false")
    {
        if ($this->isAdmin()) {
            $connection = new DatabaseConnexion();
            $usersRepository = new UserRepository();
            $usersRepository->connection = $connection;
            $users = $usersRepository->getUsers(); // User with s
            $arrayUser = json_decode(json_encode($users), true);

            $arrayMessage =  $this->setMessageForTwig($message);

            $this->twig->display('Admin/blocUserAdmin.html.twig', compact('arrayMessage', 'arrayUser'));
        } else {
            $this->redirectionNotAdmin();
        }
    }

    /**
     * Function to update role (or delete) user
     * 
     * @return void
     */
    public function modifyUser($arrayUsers)
    {
        if ($this->isAdmin()) {
            $connection = new DatabaseConnexion();
            $usersRepository = new UserRepository();
            $usersRepository->connection = $connection;
            if ($usersRepository->updateUsers($arrayUsers)) {   //  if ($usersRepository->updateUsers($arrayUsers)) {
                $message = "Utilisateur enregistré ou modifié";
                $this->blocUserAdmin($message);
            } else {
                $this->redirectionNotAdmin();
            }
        }
    }
}
