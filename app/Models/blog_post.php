<?php

class blog_post
{



private $id;
private $postTitle;
private $postChapo;
private $postContent;
private $postCreated;
private $postStatus;
private $postModified;
private $user_id;

    /**
     * @param $id
     * @param $postTitle
     * @param $postChapo
     * @param $postContent
     * @param $postCreated
     * @param $postStatus
     * @param $postModified
     * @param $user_id
     */
    public function __construct($id, $postTitle, $postChapo, $postContent, $postCreated, $postStatus, $postModified, $user_id)
    {
        $this->id = $id;
        $this->postTitle = $postTitle;
        $this->postChapo = $postChapo;
        $this->postContent = $postContent;
        $this->postCreated = $postCreated;
        $this->postStatus = $postStatus;
        $this->postModified = $postModified;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
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
     * @param mixed $postTitle
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
     * @param mixed $postChapo
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
     * @param mixed $postContent
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
     * @param mixed $postCreated
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
     * @param mixed $postStatus
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
     * @param mixed $postModified
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
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }


`
}