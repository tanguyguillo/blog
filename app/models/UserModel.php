<?php

namespace Application\Models\userModel;

//use Application\Lib\Database\DatabaseConnection;
use Application\Core\Database\Database\DatabaseConnection;

class PostsModel
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

class UsersRepository
{
    //public DatabaseConnection $connection;

    /**
     *
     * return an Array
     */
    public function getUsers(): //array
    {
        // $statement = $this->connection->getConnection()->query(
        //     "SELECT id, postTitle, postChapo, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 5"
        // );
        // $posts = [];
        // while (($row = $statement->fetch())) {
        //     $post = new PostsRepository();
        //     $post->postTitle = $row['postTitle'];
        //     $post->frenchModifiedDate = $row['french_modified_date'];
        //     $post->postChapo = $row['postChapo'];
        //     $post->id = $row['id'];
        //     $posts[] = $post;
        // }
        // return $posts;
    }
}
