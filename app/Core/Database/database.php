<?php

namespace Application\Core\Database\Database;

// Loading the config
require_once(ROOT . '/app/Config/config.php');

class DatabaseConnection
{
  public ?\PDO $database = null;

  public function getConnection(): \PDO
  {
    if ($this->database === null) {
      //Synthaxe : new PDO('mysql:host=localhost;dbname=test', $user, $pass);
      $this->database = new \PDO('mysql:host=' . SERVER . ';dbname=' . BASE . ';charset=utf8', USER, PASSWD);
    }
    return $this->database;
  }
}
