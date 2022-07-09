<?php

namespace Application\Models\DetailModel;

// use Application\Core\Database\Database\DatabaseConnection; still in main controler

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
            "SELECT id, postTitle, postChapo, postContent, DATE_FORMAT(postCreated, '%d/%m/%Y à %Hh%imin') AS french_created_date, postStatus, postName, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date, user_id  FROM blog_post where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        $post = new Detail();
        $post->idPost = $row['id'];
        $post->postTitle = $row['postTitle'];
        $post->postChapo = $row['postChapo'];
        $post->postContent = $row['postContent'];
        $post->postCreated = $row['french_created_date'];
        $post->postStatus = $row['postStatus'];
        $post->postName = $row['postName'];
        $post->postModified = $row['french_modified_date'];
        $post->user_id = $row['user_id'];
        $posts[] = $post;

        return $post;
    }
}
