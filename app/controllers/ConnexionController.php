<?php

namespace Application\Controllers\connexion;

use Application\Controllers\Controller;

/**
 * Class of user connexion
 */
class ConnexionController extends Controller
{

  /**
   * Undocumented function
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

  // public function userConnexion()
  // {
  //   // // Check for empty POST
  //   // if (
  //   //   empty($_POST['fInputPassword'])     ||
  //   //   empty($_POST['fInputEmail1'])       ||
  //   //   !filter_var($_POST['fInputEmail1'], FILTER_VALIDATE_EMAIL)
  //   // ) {
  //   //   $return = false;
  //   // }

  //   // var_dump($_POST['fInputPassword']);
  //   // exit;

  //   // original version but issues with éè etc...
  //   // $name = strip_tags(htmlspecialchars($_POST['name']));
  //   // $email_address = strip_tags(htmlspecialchars($_POST['email']));
  // }
}
