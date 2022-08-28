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
    $this->initSession(); // heritage Extends
    $this->twig->display('info/info.html.twig', compact('message'));
  }

  /**
   * signOut before new inscription // heritage Extends
   *
   * @return void
   */
  public function signOutForInscription()
  {
    $this->InitSession();
  }
}
