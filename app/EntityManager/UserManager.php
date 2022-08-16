<?php

namespace Application\EntityManager;

// use PDO;
use Application\Entity\BlogPost;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;


/**
 * Undocumented class   .... exemple 
 */
class UsertManager
{

    // private $pdo;
    // private $pdoStatement;

    public function __construct()
    {
    }


    private function create($user)
    {
    }

    public function read($id)
    {
        // $statement = $this->connection->getConnexion()->query(
        //     "SELECT * FROM user where id = $id"
        // );
        // $statement->execute();
        // $row = $statement->fetch();
        // // when user have been drop
        // if ($row) {
        //     $user = new User();
        //     $user->idUser = $row['id'];
        //     $user->emailUser = $row['emailUser'];
        //     $user->passWordUser = $row['passWordUser'];
        //     $user->firstNameUser = $row['firstNameUser'];
        //     $user->surNameUser = $row['surNameUser'];
        //     $user->roleUser = $row['roleUser'];

        //     // to convert the objet in array (warning if property private ?)
        //     // perhaps an function will be better....
        //     $user = json_decode(json_encode($user), true);
        //     return $user;
        // } else {
        //     // when user have been drop
        //     return array('id->Null');
        // }
    }

    public function readAll()
    {
    }


    private function update($user)
    {
    }

    public function delete($user)
    {
    }

    public function save($user)
    {
    }
}
