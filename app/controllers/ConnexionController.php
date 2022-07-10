<?php

namespace Application\Controllers\connexion;

use Application\Controllers\Controller;

/**
 * Class of user inscription
 */
class ConnexionController extends Controller
{
  public function connexion()
  {
    $this->twig->display('connexion/connexion.html.twig');
  }
}
