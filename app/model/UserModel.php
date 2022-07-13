<?php

namespace Application\Model\UserModel;

use Application\Core\Database\Database\DatabaseConnection;

/**
 * class just to keep in mind the attribut's names of the bdd
 */
class UserNamingBase
{
    public $id;
    public $EmailUser;
    public $passWordUser;
    public $nameUser;
    public $surNameUser;
    public $titleUser;
    public $telGsmUser;
    public $roleUser;
    public $pictureOrLogo;
}

class User
{
    /**
     * function to get a user with all of this properties
     *
     * @param string $identifier
     * @return Array
     */
    public function getUser(string $identifier): array
    {
        $statement = $this->connection->getConnection()->query(
            //"SELECT id; EmailUser; passWordUser; nameUser; surNameUser; titleUser; telGsmUser; roleUser; pictureOrLogo;  FROM user where id = $identifier"
            "SELECT * FROM user where id = $identifier"
        );

        $statement->execute();

        $row = $statement->fetch();
        $user = new User();
        $user->idUser = $row['id'];
        $user->emailUser = $row['EmailUser'];
        $user->passWordUser = $row['passWordUser'];
        $user->nameUser = $row['nameUser'];
        $user->surNameUser = $row['surNameUser'];
        $user->titleUser = $row['titleUser'];
        $user->telGsmUser = $row['telGsmUser'];
        $user->roleUser = $row['roleUser'];
        $user->pictureOrLogo = $row['pictureOrLogo'];

        // to convert the objet in array (warning if property private ?)
        // perhaps an function will be better....
        $user = json_decode(json_encode($user), true);

        return $user;
    }
}
/**
 * class used for user connexion
 */
class UsersRepository
{
    /**
     * function get all users with main informations
    
     * id
     * EmailUser
     * passWordUser
     * nameUser
     * surNameUser
     * titleUser // not used yet, next improvement perhaps
     * telGsmUser // not used, next improvement perhaps
     * roleUser
     * pictureOrLogo  // not used, next improvement perhaps
     * 
     * for EmailUser : todo : emailUser with a e
     *
     * 
     * @return array
     */
    public function getUsers(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, EmailUser, passWordUser, nameUser, surNameUser, roleUser FROM user"
        );
        $users = [];
        while (($row = $statement->fetch())) {
            $user = new UsersRepository();
            $user->id = $row['id'];
            $user->EmailUser = $row['EmailUser'];
            $user->passWordUser = $row['passWordUser'];
            $user->nameUser = $row['nameUser'];
            $user->surNameUse = $row['surNameUser'];
            $user->roleUser = $row['roleUser'];
            $users[] = $user;
        }

        // turn in Array
        $users = json_decode(json_encode($users), true);
        return $users;
    }
}
