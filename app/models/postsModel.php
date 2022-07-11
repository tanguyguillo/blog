<?php
namespace Application\Models\PostsModel;  

use Application\Lib\Database\DatabaseConnection;

class PostsModel
{
    public $id;
    public $posTitle;
    public $postChapo;
    public $postContent;
    public $postCreated;
    public $postStatus;
    public $postName;            
    public $postModified;         
}
class PostsRepository
{
    public DatabaseConnection $connection;

    /**
    *
    * return an Array
    */
    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, postTitle, postChapo, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new PostsRepository();
            $post->postTitle = $row['postTitle'];
            $post->frenchModifiedDate = $row['french_modified_date'];
            $post->postChapo = $row['postChapo'];
            $post->id = $row['id'];
            $posts[] = $post;
        }
        return $posts;
    }

/**
 * 
 * return an Array
 */
    public function getPost($id): array
    {
        $post = [];
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, postChapo, postContent, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post where id =".$id
        );
        $statement->execute($id);
        $post = new PostsRepository();
            $post->postTitle = $row['postTitle'];
            $post->frenchModifiedDate = $row['french_modified_date'];
            $post->postChapo = $row['postChapo'];
            $post->id = $row['id'];
            $posts[] = $post;
            return $posts;
    }
}

