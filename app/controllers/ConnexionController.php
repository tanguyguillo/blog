<?php

namespace Application\Controllers\connexion;

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
    if ($_SESSION['LOGGED_USER'] = true) {
      $message = 'Voila, ' . "c'est fait, " . 'vous êtes déconnecté';
      session_destroy();
      $this->twig->display('info/info.html.twig', compact('message'));
    }
  }

  /**
   * signOut before insctiption
   *
   * @return void
   */
  public function signOutForInscription()
  {
    if ($_SESSION['LOGGED_USER'] = true) {
      session_destroy();
      $_SESSION['LOGGED_USER'] = false; // for twig view
    }
  }
}
