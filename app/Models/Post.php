<?php

namespace Application\Models\Post;

use Application\Models\Model\Model;

/**
 * class
 */
class Post extends Model
{
    private $id;
    private $postTitle;
    private $postChapo;
    private $postContent;
    private $postCreated;
    private $postStatus;
    private $postModified;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param mixed
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;
    }

    /**
     * @return mixed
     */
    public function getPostChapo()
    {
        return $this->postChapo;
    }

    /**
     * @param mixed
     */
    public function setPostChapo($postChapo)
    {
        $this->postChapo = $postChapo;
    }

    /**
     * @return mixed
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * @param mixed
     */
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;
    }

    /**
     * @return mixed
     */
    public function getPostCreated()
    {
        return $this->postCreated;
    }

    /**
     * @param mixed
     */
    public function setPostCreated($postCreated)
    {
        $this->postCreated = $postCreated;
    }


    /**
     * @return mixed
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }

    /**
     * @param mixed
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;
    }

    /**
     * @return mixed
     */
    public function getPostModified()
    {
        return $this->postModified;
    }

    /**
     * @param mixed
     */
    public function setPostModified($postModified)
    {
        $this->postModified = $postModified;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * function to get back the object in Array
     *
     * @return void
     */
    public function makeArrayFromObjet()
    {
        return (get_object_vars($this));
    }
}
