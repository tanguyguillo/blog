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

      // var_dump(json_encode($_SESSION . ['LOGGED_USER']));  // see later

      $message = 'Voila, ' . "c'est fait, " . 'vous êtes déconnecté';

      session_destroy();
      // for this page a simple string...
      // $_SESSION['LOGGED_USER'] 0 or 1   $_SESSION['LOGGED_USER'] =  $user["firstNameUser"];
      $this->twig->display('info/info.html.twig', compact('message'));
    }
  }
}
