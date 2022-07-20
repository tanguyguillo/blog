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
    $this->twig->display('inscription/inscription.html.twig');
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  public function CreateAccount()
  {
    var_dump("CreateAccount");
    exit;
  }
}
