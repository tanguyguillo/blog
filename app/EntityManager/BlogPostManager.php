<?php

namespace Application\EntityManager;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Entity\blogPost\BlogPost;




/**
 * class  
 */
class BlogPostManager extends Controller
{

    /**
     * function
     */
    public function __construct()
    {
        $connection = new DatabaseConnexion();
        $BlogPost = new BlogPost();
        $BlogPost->connection = $connection;
    }

    private function create($BlogPost)
    {
    }

    public function read($id)
    {
    }

    /**
     * function
     *
     * @return void
     */
    public function readAll()
    {
        // $statement = $this->connection->getConnexion()->query(
        //     "SELECT id, postTitle, postChapo, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 100"
        // );

        // $table = [];
        // while (($row = $statement->fetch())) {
        //     // $blogPost[] = new blogPost();

        //     var_dump($row);
        // }


        // return  $statement;
    }


    private function update($BlogPost)
    {
    }

    public function delete($BlogPost)
    {
    }

    public function save($BlogPost)
    {
    }
}
