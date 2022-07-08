<?php

namespace Application\Controllers\InscriptionUserController;

use Application\Controllers\Controller;
use Application\Core\Database\Database\DatabaseConnection;

/**
 * Class of user inscription
 */
class InscriptionUserController extends Controller
{

  public function execute()
  {
    //$connection = new DatabaseConnection(); // from models

    $this->twig->display('inscription/inscription.html.twig');
  }
}
