<?php

namespace Application\Model\UserModel;

use Application\Core\Database\Database\DatabaseConnection;

// class UserModel
// {
//     public $id;
//     public $EmailUser;
//     public $passWordUser;
//     public $nameUser;
//     public $surNameUser;
//     public $titleUser;
//     public $telGsmUser;
//     public $roleUser;
//     public $pictureOrLogo;
// }

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


    // /**
    //  *
    //  * return an Array
    //  */
    // public function getUsers(): //array
    // {
    //     // $statement = $this->connection->getConnection()->query(
    //     //     "SELECT id, postTitle, postChapo, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 5"
    //     // );
    //     // $posts = [];
    //     // while (($row = $statement->fetch())) {
    //     //     $post = new PostsRepository();
    //     //     $post->postTitle = $row['postTitle'];
    //     //     $post->frenchModifiedDate = $row['french_modified_date'];
    //     //     $post->postChapo = $row['postChapo'];
    //     //     $post->id = $row['id'];
    //     //     $posts[] = $post;
    //     // }
    //     // return $posts;
    // }


}
