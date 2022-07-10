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
    //$connection = new DatabaseConnection(); // from models

    $this->twig->display('inscription/inscription.html.twig');
  }


  public function connexion()
  {
  }
}
