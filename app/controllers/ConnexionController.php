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
      session_destroy();
      // for this page a simple string...
      $message = 'Voila, vous êtes déconnecté';
      $this->twig->display('info/info.html.twig', compact('message'));
    }
  }
}
