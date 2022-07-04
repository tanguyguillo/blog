<?php

namespace Application\Models\DetailModel;

use Application\Core\Database\Database\DatabaseConnection;

class DetailModel
{
    /// inside blogPost table
    public $idPost;
    public $postTitle;
    public $postChapo;
    public $postContent;
    public $postCreated;
    public $postStatus;
    public $postName;
    public $postModified;
    public $user_id;
}

class Detail
{
    /**
     *  put in an array one post
     * 
     * return an Array
     */
    public function getPost(string $identifier): Detail
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `blog_post` WHERE id = $identifier"
        );

        $statement->execute();

        $row = $statement->fetch();
        $post = new Detail();
        $post->idPost = $row['id'];
        $post->postTitle = $row['postTitle'];
        $post->postChapo = $row['postChapo'];
        $post->postContent = $row['postContent'];
        $post->postCreated = $row['postCreated'];
        $post->postStatus = $row['postStatus'];
        $post->postName = $row['postName'];
        $post->postModified = $row['postModified'];
        $post->user_id = $row['$user_id'];

        $posts[] = $post;

        return $post;
    }
}
