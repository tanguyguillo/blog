<?php

namespace Application\Repositories\UserRepository;

use Application\Models\User;
use Application\Repositories\Repository\Repository;

/**
 *  class 
 */
class UserRepository
{
    /**
     * function to get a user with all of this properties
     *
     * @param string $identifier
     * @return Object
     */
    public function getUser(string $identifier)
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT * FROM user where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        // when user have been drop
        if ($row) {
            $user = new UserRepository();
            $user = new User($row); // hydratattion
        } else {
            $user = new User();
            $user->setId("NULL");
        }
        return $user;
    }

    /**
     * function getUsers with a S : get all users with main informations
     *
     *
     * @return array
     */
    public function getUsers(): array
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, emailUser, passWordUser, firstNameUser, surNameUser, roleUser FROM user"
        );
        $users = [];
        while (($row = $statement->fetch())) {
            $user = new UserRepository();
            $user->id = $row['id'];
            $user->emailUser = $row['emailUser'];
            $user->passWordUser = $row['passWordUser'];
            $user->firstNameUser = $row['firstNameUser'];
            $user->surNameUse = $row['surNameUser'];
            $user->roleUser = $row['roleUser'];
            $users[] = $user;

            // hydratation userModel
            //$userModel = new UserModel($row);
        }
        // turn in Array
        $users = json_decode(json_encode($users), true);
        return $users;
    }



    /**
     * function to create a user with "user" role
     *
     * @param array $postData
     * @return void
     */
    public function createUser(array $postData)
    {
        // Crypt the password
        $passWordUser = $postData["password"];
        $this->cryptPassword($passWordUser);

        $emailUser = $postData["email"];
        $firstNameUser = $postData["fname"];
        $surNameUser = $postData["lname"];
        $roleUser = "User";

        // have to hydrate the model user
        $user = new User();
        $user->setFirstNameUser($firstNameUser);
        $user->setSurNameUser($surNameUser);
        $user->setPassWordUser($passWordUser);
        $user->setRoleUser($roleUser);
        $user->setEmailUser($emailUser);

        // adding info for generic $repository->create()
        $table = "User";
        $statement = $this->connection->getConnexion();
        $repository = new Repository;
        // Generic
        if ($repository->create($user, $table, $statement)) {
            return true;
        } else {
            return false;
        }
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
        $statement = $this->connection->getConnexion()->query(
            "SELECT emailUser,count(*) FROM user WHERE emailUser ='$emailUser' GROUP BY emailUser"
        );
        $statement->execute();
        $row = $statement->fetch();
        $count = (int)$row['count(*)'];
        return  $count;
    }

    /**
     * function for hashage of the user password
     *
     * @param [string] $password
     * @return hashed password
     */
    private function cryptPassword($password)
    {
        $hashed = crypt($password, 'anythingyouwant_$' . SALT);
        return $hashed;
    }

    /**
     * get the listing for admin part to modify a post : you DO have admin role to acces to this Aera
     *   b.id, postTitle, postChapo, postContent, firstNameUser, surNameUser,emailUser, roleUser, 'user_id'
     * du plus récent au plus ancien?  postName for author
     *
     * @return array
     */
    public function getPostAndUser()
    {
        if ($_SESSION['LOGGED_USER'] and ($_SESSION['ROLE_USER'] == 'Admin')) {
            $errorMessage = "you DO have admin role to acces to this Aera";
            try {
                $statement = $this->connection->getConnexion()->query(
                    "SELECT b.id, postTitle, postChapo, postContent, postModified, postStatus, firstNameUser, surNameUser,emailUser, roleUser, b.user_id
                FROM blog_post AS b
                JOIN user as ud
                ON(b.user_id = ud.id)"
                );
                $datas = [];
                $statement->execute();
                while (($row = $statement->fetch())) {
                    $data = new UserRepository();
                    $data->postId = $row['id'];
                    $data->postTitle = $row['postTitle'];
                    $data->postChapo = $row['postChapo'];
                    $data->postContent = $row['postContent'];
                    $data->postStatus = $row['postStatus'];
                    $data->postModified = $row['postModified'];
                    $data->userId = $row['user_id'];
                    $data->firstNameUser = $row['firstNameUser'];
                    $data->surNameUser = $row['surNameUser'];
                    $data->emailUser = $row['emailUser'];
                    $data->roleUser = $row['roleUser'];
                    $datas[] = $data;
                }
                return $datas;
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                require(ROOT . '/app/templatesError/error.php');
                return false;
            }
        }
    }

    /**
     *
     * @return array
     *
     *  for admin
     * $role Admin or User  // GROUP BY emailUser
     *
     */
    public function getEmailUser(string $role)
    {
        if ($_SESSION['LOGGED_USER'] and ($_SESSION['ROLE_USER'] == 'Admin')) {
            $errorMessage = "you DO have admin role to acces to this Aera";
            $Emails = [];
            try {
                $statement = $this->connection->getConnexion()->query(
                    "SELECT id, emailUser FROM user WHERE roleUser ='$role'"
                );
                $statement->execute();
                while (($row = $statement->fetch())) {
                    $email = new UserRepository();
                    $email->idlUser = $row['id'];
                    $email->emailUser = $row['emailUser'];
                    $Emails[] = $email;
                }
                return $Emails;
            } catch (\Exception $e) {
                // to redirect own error page
                $errorMessage = $e->getMessage();
                require(ROOT . '/app/templatesError/error.php');
                return false;
            }
        }
    }

    /**
     * function to manage user
     *
     * @param array $arrayUser
     * @return void
     */
    public function updateUsers(array $arrayUser)
    {
        // to look out data comming from outside even in admin aera
        foreach ($arrayUser as $key => $value) {
            $Data[$key]  = strip_tags(htmlspecialchars($value));
            $Data[$key] = str_replace("'", "&apos;", $value);
        }

        $id = ($arrayUser["id"]);
        // $emailUser = ($arrayUser["emailUser"]); /// perhaps for later....
        // $firstNameUser = ($arrayUser["firstNameUser"]);
        // $surNameUse = ($arrayUser["surNameUse"]);
        $roleUser = ($arrayUser["roleUser"]);

        try {
            $query = "UPDATE user SET roleUser = '$roleUser' WHERE id = '$id' ";

            // delete
            if (isset($arrayUser["checkbox"])) {
                $query = "DELETE FROM user WHERE id = $id";
                $statement = $this->connection->getConnexion()->query($query);
                return true;
            }
            $statement = $this->connection->getConnexion()->query($query);
            return true;
        } catch (\Exception $e) {
            //$this->twig->display('error/error.html.twig', compact('message'));
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }


    /***************************************************** from here V1 not used ******************************************************************************************
     * 
     */

    /**
     * function to create a new user
     *
     * @param [array] $postData
     * @return void
     */
    public function createUserV1(array $postData)
    {
        $emailUser = $postData["email"];

        $passWordUser = $postData["password"];
        // Crypt the password
        $this->cryptPassword($passWordUser);

        $firstNameUser = $postData["fname"];
        $surNameUser = $postData["lname"];
        $roleUser = "User";

        try {
            $statement = $this->connection->getConnexion()->query(
                "INSERT INTO user (emailUser, passWordUser, firstNameUser, surNameUser, roleUser)  VALUES ('$emailUser', '$passWordUser', '$firstNameUser', '$surNameUser', '$roleUser');"
            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
        return true;
    }
}
