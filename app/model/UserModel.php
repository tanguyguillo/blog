<?php

namespace Application\Model\UserModel;

use Application\Core\Database\Database\DatabaseConnection;

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
            //"SELECT id; emailUser; passWordUser; firstNameUser; surNameUser; titleUser; telGsmUser; roleUser; pictureOrLogo;  FROM user where id = $identifier"
            "SELECT * FROM user where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        $user = new User();
        $user->idUser = $row['id'];
        $user->emailUser = $row['emailUser'];
        $user->passWordUser = $row['passWordUser'];
        $user->firstNameUser = $row['firstNameUser'];
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
     *
     * 
     * @return array
     */
    public function getUsers(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, emailUser, passWordUser, firstNameUser, surNameUser, roleUser FROM user"
        );
        $users = [];
        while (($row = $statement->fetch())) {
            $user = new UsersRepository();
            $user->id = $row['id'];
            $user->emailUser = $row['emailUser'];
            $user->passWordUser = $row['passWordUser'];
            $user->firstNameUser = $row['firstNameUser'];
            $user->surNameUse = $row['surNameUser'];
            $user->roleUser = $row['roleUser'];
            $users[] = $user;
        }
        // turn in Array
        $users = json_decode(json_encode($users), true);
        return $users;
    }

    /**
     * function to create a new user
     *
     * @param [array] $postData
     * @return void
     */
    public function createUser(array $postData)
    {
        $emailUser = $postData["email"];
        $passWordUser = $postData["password"];
        $firstNameUser = $postData["fname"];
        $surNameUser = $postData["lname"];
        $roleUser = "User";

        try {
            $statement = $this->connection->getConnection()->query(
                "INSERT INTO user (emailUser, passWordUser, firstNameUser, surNameUser, titleUser, telGsmUser, roleUser, pictureOrLogo)  VALUES ('$emailUser', '$passWordUser', '$firstNameUser', '$surNameUser', NULL, NULL, '$roleUser', NULL);"
            );
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
        return true;
    }

    /**
     * function to know if this email is already inDB
     *
     * @param array $postData
     * @return string 
     */
    public function findEmail(array $postData)
    {
        $emailUser = $postData["email"]; // string 
        $statement = $this->connection->getConnection()->query(
            "SELECT emailUser,count(*) FROM user WHERE emailUser ='$emailUser' GROUP BY emailUser"
        );
        $statement->execute();
        $row = $statement->fetch();
        $count = (int)$row['count(*)'];
        return  $count;
    }
}
