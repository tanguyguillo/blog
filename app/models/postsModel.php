<?php

namespace Application\Models\PostsModel;  // nameSpace for this (these) Class

use Application\Lib\Database\DatabaseConnection;


//require_once('///Users/Tanguy/Documents/sites/blog-omega/app/lib/database.php');

/* table blog_post
id
postTitle
postChapo
postContent
postCreated
postStatus
postName
postModified
user_id
*/

class PostsModel
{
    public $id;
    public $posTitle;
    public $postChapo;
    public $postContent;
    public $postCreated;
    public $postStatus;
    public $postName;              // not used yet
    public $postModified;          // not used yet
}

/**
 *
 * return an Array
 */
class PostsRepository
{
    public DatabaseConnection $connection;

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



    /*public function getPosts
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, postChapo, postContent, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $post = new Post();
        //$post->title = $row['title'];
        //$post->frenchCreationDate = $row['french_creation_date'];
        //$post->content = $row['content'];
       // $post->identifier = $row['id'];

        return $post;
    }*/
}
