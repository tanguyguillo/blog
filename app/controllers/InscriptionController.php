<?php

namespace Application\Controllers\InsscriptionController;

use Application\Controllers\Controller;
use Application\Core\Database\Database\DatabaseConnection;

/**
 * Class of user inscription
 */
class InscriptionController extends Controller
{

  public function inscription()
  {
    $this->twig->display('inscription/inscription.html.twig');
  }

  /**
   * function to create a user  account 
   *
   * @return void
   */
  public function CreateAccount(array $postData)
  {

    // foreach ($postData as $cle => $valeur) {
    //   echo 'La clé ' . $cle . ' contient la valeur ' . $valeur . "\n";
    //   echo '<br>';
    // }


    // array $postData, string $messsage = '')
    // {
    //     // if exist
    //     if (isset($postData['user_login']) &&  isset($postData['user_pass'])) {
    //         $connection = new DatabaseConnection();
    //         $UserRepository = new UsersRepository();
    //         $UserRepository->connection = $connection;
    //         //$user = $UsersRepository->createUsers(); // return an array
    //     }
    echo " Cette partie est en cours de développement....";
    exit;
  }
}
