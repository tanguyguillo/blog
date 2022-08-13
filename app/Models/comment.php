<?php


class comment
{

private $id;
private $commentCreated;
private $commentStatus;
private $commentContent;
private $user_id;
private $blog_post_id;
private $blog_post_user_id;

    /**
     * @param $id
     * @param $commentCreated
     * @param $commentStatus
     * @param $commentContent
     * @param $user_id
     * @param $blog_post_id
     * @param $blog_post_user_id
     */
    public function __construct($id, $commentCreated, $commentStatus, $commentContent, $user_id, $blog_post_id, $blog_post_user_id)
    {
        $this->id = $id;
        $this->commentCreated = $commentCreated;
        $this->commentStatus = $commentStatus;
        $this->commentContent = $commentContent;
        $this->user_id = $user_id;
        $this->blog_post_id = $blog_post_id;
        $this->blog_post_user_id = $blog_post_user_id;
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
    public function getCommentCreated()
    {
        return $this->commentCreated;
    }

    /**
     * @param mixed $commentCreated
     */
    public function setCommentCreated($commentCreated)
    {
        $this->commentCreated = $commentCreated;
    }

    /**
     * @return mixed
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * @param mixed $commentStatus
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
    }

    /**
     * @return mixed
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param mixed $commentContent
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
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

    /**
     * @return mixed
     */
    public function getBlogPostId()
    {
        return $this->blog_post_id;
    }

    /**
     * @param mixed $blog_post_id
     */
    public function setBlogPostId($blog_post_id)
    {
        $this->blog_post_id = $blog_post_id;
    }

    /**
     * @return mixed
     */
    public function getBlogPostUserId()
    {
        return $this->blog_post_user_id;
    }

    /**
     * @param mixed $blog_post_user_id
     */
    public function setBlogPostUserId($blog_post_user_id)
    {
        $this->blog_post_user_id = $blog_post_user_id;
    }


}