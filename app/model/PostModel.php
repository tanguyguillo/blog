<?php

namespace Application\Model\PostModel;

use Application\Core\Database\Database\DatabaseConnection;

/**
 * class just to keep in mind the attribut's names of the bdd
 */
class PostNamingBase
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
    /**
     *
     * return an Array
     */
    public function getPosts(): array
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new PostsRepository();
            $post->postStatus = $row['postStatus'];
            $post->postTitle = $row['postTitle'];
            $post->frenchModifiedDate = $row['french_modified_date'];
            $post->postChapo = $row['postChapo'];
            $post->id = $row['id'];
            $posts[] = $post;
        }
        return $posts;
    }
}
