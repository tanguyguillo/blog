<?php

namespace Application\Controllers\connexion;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\UserModel\UsersRepository;
use Application\Model\UserModel\User;



use Application\Controllers\Controller;

/**
 * Class of user connexion
 */
class ConnexionController extends Controller
{
  /**
   * function connexion page
   *
   * @param string $message
   * @return void
   */
  public function connexion($message = '')
  {
    $baseUrl = BASE_URL;

    // to be readeable by twig
    $arrayMessage = array(
      "message" => $message
    );
    $this->twig->display('connexion/connexion.html.twig', compact('baseUrl', 'arrayMessage'));
  }

  /**
   * function to signOut
   *
   * @return void
   */
  public function signOut()
  {
    $message = 'Voila, ' . "c'est fait, " . 'vous êtes déconnecté';
    $_SESSION['LOGGED_USER']  = false;
    $_SESSION['LOGGED_USER_NAME']  = '';
    $_SESSION['LOGGED_USER_ID']  = '';

    session_destroy();
    $this->twig->display('info/info.html.twig', compact('message'));
  }

  /**
   * signOut before insctiption
   *
   * @return void
   */
  public function signOutForInscription()
  {
    $_SESSION['LOGGED_USER']  = false; // for twig view
    $_SESSION['LOGGED_USER_NAME']  = '';
    $_SESSION['LOGGED_USER_ID']  = '';

    session_destroy();
  }
}
