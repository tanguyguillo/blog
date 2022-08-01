<?php

namespace Application\Controllers\ConnexionController;


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
    $this->InitSession;
    $this->twig->display('info/info.html.twig', compact('message'));
  }

  /**
   * signOut before inscription
   *
   * @return void
   */
  public function signOutForInscription()
  {
    $this->InitSession();
  }

  /**
   * function Unset all of the session variables and Finally, destroy the session.
   *
   * @return void
   */
  public function InitSession()
  {
    // session_start();
    // // Unset all of the session variables.
    $_SESSION = array();

    // $_SESSION['LOGGED_USER']  = false; // for twig view
    // $_SESSION['LOGGED_USER_NAME']  = '';
    // $_SESSION['LOGGED_USER_ID']  = '';

    unset($_SESSION['LOGGED_USER']);
    unset($_SESSION['LOGGED_USER_NAME']);
    unset($_SESSION['LOGGED_USER_ID']);
    unset($_SESSION);
    session_destroy();
  }
}
