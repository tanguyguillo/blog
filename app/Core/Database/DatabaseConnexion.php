<?php

namespace Application\Core\Database\DatabaseConnexion;

// Loading the config
require_once(ROOT . '/app/config/config.php');


/** like a Repositories
 */

class DatabaseConnexion
{
  public ?\PDO $database = null;  // if PDO .... ok otherwise = null 

  /**
   * connexion to the database; 
   *  SERVER, BASE and USER, PASSWD in a congig file in folder config to the root of app
   * 
   * @var \PDO|null
   */
  public function getConnexion(): \PDO
  {
    if ($this->database === null) {
      // todo : write a try ?
      $this->database = new \PDO('mysql:host=' . SERVER . ';dbname=' . BASE . ';charset=utf8', USER, PASSWD);
    }
    return $this->database;
  }
}
