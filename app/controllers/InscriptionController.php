<?php

namespace Application\Controllers\InsscriptionController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\UserModel;
use Application\Model\UserModel\UsersRepository;

use Application\Controllers\Controller;
use Application\Controllers\connexion\ConnexionController;

/**
 * Class of user inscription
 */
class InscriptionController extends Controller
{
  /**
   * function just to go the inscription page
   *
   * @return void
   */
  public function inscription()
  {
    $this->twig->display('inscription/inscription.html.twig');
  }

  /**
   * function to create a user account 
   *
   * @return void
   */
  public function CreateAccount(array $postData)
  {
    if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {
      // you have to not be connected to inscript
      (new ConnexionController())->signOutForInscription();
    }

    $connection = new DatabaseConnection();
    $UserRepository = new UsersRepository();
    $UserRepository->connection = $connection;

    // verify Email if not allready use in the DB before create new user
    if ($UserRepository->findEmail($postData) >= 1) {
      $message = "Cet email est déja utilisé, vueillez en choisir un autre";
      $this->twig->display('info/info.html.twig', compact('message'));
    } else {
      if ($UserRepository->createUser($postData)) {
        $message = "Bravo vous avez crée votre compte, connectez vous pour laisser un commentaire sur un article";
        $this->twig->display('info/info.html.twig', compact('message'));
      };
    }
  }
}
