<?php

namespace Application\Core\Database\DatabaseConnexion;

// Loading the config
require_once(ROOT . '/app/config/config.php');

class DatabaseConnexion
{
  public ?\PDO $database = null;  // if PDO .... ok otherwise = null 

  /**
   * connexion to the database; 
   *  SERVER, BASE and USER, PASSWD in a congig file in folder config to the root of app
   * 
   * @var \PDO|null
   */
  public function getConnection(): \PDO
  {
    if ($this->database === null) {
      //Synthaxe for exeample: new PDO('mysql:host=localhost;dbname=test', $user, $pass);
      // todo : write a try ?
      $this->database = new \PDO('mysql:host=' . SERVER . ';dbname=' . BASE . ';charset=utf8', USER, PASSWD);
    }
    return $this->database;
  }
}