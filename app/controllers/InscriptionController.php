<?php

namespace Application\Controllers\InscriptionController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\UserModel;
use Application\Model\UserModel\UsersRepository;

use Application\Controllers\Controller;
use Application\Controllers\ConnexionController;
use Application\Controllers\ConnexionController\ConnexionController as ConnexionControllerConnexionController;

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
   * function to create a user account (with crypt password)
   *
   * @return void
   */
  public function createAccount(array $postData)
  {
    (new ConnexionControllerConnexionController())->signOutForInscription();
    $connection = new DatabaseConnection();
    $UserRepository = new UsersRepository();
    $UserRepository->connection = $connection;

    // verify Email if not allready use in the DB before by created user
    if ($UserRepository->findEmail($postData) >= 1) {
      $message = "Cet email est déja utilisé, vueillez en choisir un autre";
      $this->twig->display('info/info.html.twig', compact('message'));
    } else {
      $postData['password'] = crypt($postData['password'], SALT);
      if ($UserRepository->createUser($postData)) {
        $message = "Bravo vous avez crée votre compte, connectez vous pour laisser un commentaire sur un article";
        $this->twig->display('info/info.html.twig', compact('message'));
      };
    }
  }
}
