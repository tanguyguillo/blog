<?php

namespace Application\Core\Database\DatabaseConnexion;

// Loading the config
require_once ROOT . '/app/config/config.php';

/**
 */
class DatabaseConnexion
{
    private static $instance;

    public ?\PDO $database = null;
    /**
     * connexion to the database;
     *  SERVER, BASE and USER, PASSWD in a congig file in folder config to the root of app
     *
     * @var \PDO|null
     */
    public function getConnexion(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=' . SERVER . ';dbname=' . BASE . ';charset=utf8', USER, PASSWD);
            $this->database->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->database->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->database;
    }
}
